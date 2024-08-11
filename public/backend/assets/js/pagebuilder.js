import { handleWidgetDrop, handleWidgetDragStart, handleDragOver } from './modules/widgetHandler.js';
import { enableWidgetEditing } from './modules/widgetEditor.js';
import { StateManager } from './modules/stateManager.js';
import { displayError, displaySuccess } from './modules/notificationHandler.js';
import { setupWidgetControls } from './modules/widgetControls.js';

document.addEventListener('DOMContentLoaded', function () {
    const stateManager = new StateManager();

    document.querySelectorAll('.widget-item').forEach(function (widgetItem) {
        widgetItem.addEventListener('dragstart', handleWidgetDragStart);
    });

    document.querySelector('#main-canvas').addEventListener('drop', function (event) {
        handleWidgetDrop(event, stateManager);
    });
    document.querySelector('#main-canvas').addEventListener('dragover', handleDragOver);

    document.querySelector('#save-page').addEventListener('click', function (event) {
        savePageContent(event, stateManager);
    });
    document.querySelector('#undo').addEventListener('click', function () {
        undoAction(stateManager);
    });
    document.querySelector('#redo').addEventListener('click', function () {
        redoAction(stateManager);
    });

    // first time page load clear the undo stack
    stateManager.clearUndoStack();


    function removeElementsByClass(htmlString, className) {
        // Create a temporary DOM element to manipulate the HTML
        var tempDiv = document.createElement('div');
        tempDiv.innerHTML = htmlString;

        // Find and remove elements with the specified class
        var elements = tempDiv.getElementsByClassName(className);
        while (elements.length > 0) {
            elements[0].parentNode.removeChild(elements[0]);
        }

        return tempDiv.innerHTML;
    }

    function savePageContent(event, stateManager) {
        event.preventDefault();
        const content = document.querySelector('#main-canvas').innerHTML;
        const page_id = document.querySelector('#page-id').value;
        let pageContent = removeElementsByClass(content, 'widget-control-panel');
        fetch(`/save-page`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                page_content: pageContent,
                page_id: page_id
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    displayError(data.error);
                } else {
                    displaySuccess('Page saved successfully!');
                }
            })
            .catch(error => displayError('An error occurred while saving the page.'));
    }

    function undoAction(stateManager) {
        const content = stateManager.undo();
        if (content) {
            document.querySelector('#main-canvas').innerHTML = content;
            reinitializeWidgets();
        }
    }

    function redoAction(stateManager) {
        const content = stateManager.redo();
        if (content) {
            document.querySelector('#main-canvas').innerHTML = content;
            reinitializeWidgets();
        }
    }

    function reinitializeWidgets() {
        document.querySelectorAll('.widget-init').forEach(function (widgetElement) {
            enableWidgetEditing(widgetElement);
            setupWidgetControls(widgetElement, widgetElement.getAttribute('data-widget'));
        });
    }

    // Restore the initial state
    if (stateManager.getCurrentState()) {
        document.querySelector('#main-canvas').innerHTML = stateManager.getCurrentState();
        reinitializeWidgets();
    } else {
        stateManager.addToUndoStack(document.querySelector('#main-canvas').innerHTML);
    }
});