define(function (require) {

    "use strict";

    var _                   = require('underscore'),
        Backbone            = require('backbone'),
        tpl                 = require('text!tpl/GenericList.html'),
        template = _.template(tpl);

    return Backbone.View.extend({

        initialize: function () {
         
            this.render();
            this.collection.on("reset", this.render, this);

        },

        render: function () {
            var context;
            if(Backbone.history.fragment==="" || Backbone.history.fragment==="undefined" || Backbone.history.fragment==="null"){
                context = "news";
            }
            else{
                context = Backbone.history.fragment;
            }
            this.$el.html(template({items:this.collection.toJSON(), context:context}));
            return this;
        },
 

    });

});