jQuery(document).ready(function($){
    $('.poster_live_tab_item:nth-child(1)').addClass('poster_live_active');
    jQuery('.poster_live_tab_item').click(function(event){
        jQuery('.poster_live_posts_cat').css('display','none');
       var cat_id=$(this).attr('data-catID');
       $('.poster_live_posts_cat_'+cat_id).css('display','block');
       $('.poster_live_tab_item').removeClass('poster_live_active');
       $('.poster_live_tab_item[data-catID='+cat_id+']').addClass('poster_live_active')
        
    });
});