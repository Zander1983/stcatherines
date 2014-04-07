define(function (require) {

    "use strict";

    var Backbone            = require('backbone'),
        Feeds               = require('app/utils/feed_paths'),
        id=1,
        xml,
        parsed = [], 
        title = "", 
        description = "", 
        pubDate = "", 
        
        
        GenericModel = Backbone.Model.extend({  
            
                         
            url: function(){

                    if(in_browser===false){
                        return this.feed_domain+Feeds.getFeed();
                    }
                    else{
                        return "/school-proxy.php?feed_domain="+this.feed_domain+"&context="+Backbone.history.fragment;
                    }
            },
               
                    
            initialize: function(options){
                this.feed_domain = options.feed_domain;
        
            },
            
        
            parse: function (xml) {

                title = $(xml).find('item').find('title').text();

                description = $(xml).find('item').find('description').text();

                pubDate = $(xml).find('item').find('pubDate').text();

                pubDate = pubDate.substring(0, pubDate.length-12);

                parsed.title = title;
                parsed.description = description;
                parsed.pubDate = pubDate;
                
                return parsed;
            },
                    

            fetch: function (options) {
                options = options || {};
                options.dataType = "xml";
                
                return Backbone.Model.prototype.fetch.call(this, options);
            }

        });



    return {
        GenericModel: GenericModel
    };

});