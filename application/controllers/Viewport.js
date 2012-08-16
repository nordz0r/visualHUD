visualHUD.Controllers.Viewport = Backbone.Controller.extend({
    views: [
        'visualHUD.Views.Viewport',
        'visualHUD.Views.CanvasToolbar',
        'visualHUD.Views.Canvas',
        'visualHUD.Views.TopBar',
        'visualHUD.Views.StageControls',
        'visualHUD.Views.GroupActionsPanel',
        'visualHUD.Views.DownloadWindow',
        'visualHUD.Views.ToolTip'
    ],

    models: [
        'visualHUD.Models.ClientSettings',
        'visualHUD.Models.HUDItem'
    ],

    collections: [
        'visualHUD.Collections.StageControlsDictionary',
        'visualHUD.Collections.HUDItemTemplates',
        'visualHUD.Collections.HUDItemIconEnums',
        'visualHUD.Collections.HUDItems'
    ],

    initialize: function(options) {
        this.addListeners([
            {
                'Viewport': {
                    render: this.onViewportRender
                }
            },
            {
                'CanvasToolbar': {
                    'setCanvasOptions': this.setCanvasOptions
                }
            },
            {
                'TopBar': {
                    'toolbar.action': this.toolbarAction
                }
            },
            {
                'Canvas': {
                    'selectionchange': this.onSelectionChange
                }
            }
        ]);
    },

    onLaunch: function() {
        var clientSettingsModel = this.getModel('ClientSettings');
        this.toolTips = this.createView('ToolTip');

        var viewport = this.createView('Viewport');
        var toobar = this.createView('CanvasToolbar', {
            appToolTips: this.toolTips,
            clientSettingsModel: clientSettingsModel
        });
        var canvas = this.createView('Canvas', {
            clientSettingsModel: clientSettingsModel
        });
        var topBar = this.createView('TopBar');
        var groupActionsPanel = this.createView('GroupActionsPanel');

        var stageControls = this.createView('StageControls', {
            collection: this.getCollection('StageControlsDictionary')
        });



        toobar.render(viewport);
        canvas.render(viewport);
        topBar.render(viewport);
        stageControls.render(viewport);
        groupActionsPanel.render(viewport);

        viewport.render([toobar, canvas, topBar, stageControls]);

        clientSettingsModel.on('change', clientSettingsModel.save, clientSettingsModel);
    },

    onViewportRender: function(view) {
        //this.initializeClientSettings();
    },

    /**
     * Event Handler triggered by visualHUD.Views.CanvasToolbar when used change Client Settings
     */
    setCanvasOptions: function(data) {
        var clientSettings = this.getModel('ClientSettings');
        var value = data.enabled == true ? data.value : false;
        clientSettings.set(data.name,  value);
    },

    /**
     * Event handler triggered by visualHUD.Views.TopBar action
     * @param action
     */
    toolbarAction: function(action) {
        var fn = this[action];
        if(_.isFunction(fn)) {
            fn.apply(this, arguments);
        }
    },

    /**
     * Event Handler triggered by [Download] button
     */
    downalodHUD: function() {
        console.log('Downloading new HUD > ', this.getCollection('HUDItems').toJSON());

        var HUDItemsCollection = this.getCollection('HUDItems');

        if(!this.downloadWindow) {
            var winConstructor = this.getViewConstructor('DownloadWindow');
            this.downloadWindow = new  winConstructor({
                width: 600,
                title: 'Download HUD',
                jsonData: JSON.stringify(HUDItemsCollection.toJSON())
            });
        }

        this.downloadWindow.show();
    },

    /**
     * Event Handler triggered by [Load Preset] button
     */
    loadPreset: function() {

    },

    /**
     * Event Handler triggered by [Restart Application] button
     */
    restartApplication: function() {
        window.location.reload();
    },

    /**
     * Event Handler triggered by [Report Bug] button
     */
    reportBug: function() {

    },

    /**
     * Event Handler triggered by visualHUD.Views.Canvas selection model
     */
    onSelectionChange: function(view, selection) {
        this.getView('Viewport').hideAllSidebarItems();

        if(selection.length == 1) {
            selection[0].getForm().show()
        }
        else if( selection.length > 1) {
            this.getView('GroupActionsPanel').show();
        }
        else if(selection.length == 0) {
            this.getView('StageControls').show();
            this.application.getController('FocusManager').blur();
        }
    }
});

