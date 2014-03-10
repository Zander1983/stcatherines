define(function (require) {

    "use strict";

    var Backbone            = require('backbone'),
        Feeds               = require('app/utils/feed_paths'),
        id=1,
        xml,
        parsed_albums = [], 
        num_photos,
        id,
        title,
        
        
        Album = Backbone.Model.extend({  

 
        }),

        
        AlbumCollection = Backbone.Collection.extend({

            model: Album,
                        
            url: function(){

                    if(in_browser===false){
                        return Feeds.getFeed();
                    }
                    else{
                        return "/school-proxy.php?context="+Backbone.history.fragment+"&flickr_api_key="+flickr_api_key+"&flickr_user_id="+flickr_user_id;
                    }
            },
            
        
            parse: function (data) {
                xml = data;
                
                $(xml).find('photoset').each(function (index) {
                    
                    title = $(this).find('title').text();
                    id = $(this).attr('id');                    
                    num_photos = $(this).attr('photos');
         
                    parsed_albums.push({id:id, title: title, num_photos:num_photos});
                   
                });

                return parsed_albums;
            },
                    

            fetch: function (options) {
                options = options || {};
                options.dataType = "xml";
                return Backbone.Collection.prototype.fetch.call(this, options);
            }

        });


    return {
        Album: Album,
        AlbumCollection: AlbumCollection
    };

});