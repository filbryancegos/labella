jQuery(document).ready(function(a){"use strict";var e=[],t=[],n=[],s=[],o=[],d=[],i=[],r=[];a(".cms-grid-wraper").each(function(){var c=a(this),p=c.attr("id"),l=window["cms_more_obj"+p.replace(new RegExp("-","g"),"_")];if("undefined"!=typeof l){if(e[p]=parseInt(l.startPage)+1,t[p]=parseInt(l.total),n[p]=parseInt(l.maxPages),s[p]=parseInt(l.perpage),o[p]=l.nextLink,d[p]=l.masonry,setInterval(function(){jQuery("#main").find("audio,video").mediaelementplayer()},3e3),a.html_idPost=function(a,e,t){return i[p]=a-e*t,"Show More"},a.loadData=function(i){a.get(o[i],function(c){if("masonry"==d[i]){var p=a(c).find("#"+i+" .cms-grid-masonry > .cms-grid-item");a("#"+i).children(".cms-grid-masonry").append(p),a(p).imagesLoaded(function(){a("#"+i).children(".cms-grid-masonry").shuffle("appended",p)})}else r[i]=a(a(c).find("#"+i).children(".cms-grid").html()),a("#"+i).children(".cms-grid").append(r[i]);e[i]++,o[i]=o[i].indexOf("/page/")>-1?o[i].replace(/\/page\/[0-9]?/,"/page/"+e[i]):o[i].replace(/paged=[0-9]?/,"paged="+e[i]),a("#"+i+" .cms-load-posts").before('<div class="cms-placeholder-'+e[i]+'"></div>'),a("#"+i+" .cms-load-posts a").text(e[i]<=n[i]?a.html_idPost(t[i],s[i],e[i]-1):"No more posts to load."),a("#"+i+" .cms-load-posts").find("a").data("loading",0)})},e[p]<=n[p]){var m=a.html_idPost(t[p],s[p],1);a("#"+p+" .cms_pagination").append('<div class="cms-placeholder-'+e[p]+'"></div><p class="cms-load-posts"><a data-loading="0" href="#" class="wpb_button_anone wpb_none btn btn-default cms-bounce-to-bottom">'+m+"</a></p>")}a("#"+p+" .cms-load-posts a").click(function(){return e[p]<=n[p]?(a(this).text("Loading posts..."),a.loadData(p)):a("#"+p+" .cms-load-posts a").append("."),!1})}})});