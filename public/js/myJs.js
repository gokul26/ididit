
// Like FUnctions for user
function like(x)
{
     $.ajax({
        url: "/like",
        method: 'post',
        data: {
            '_token': $('input[name=_token]').val(),'noteid': x,
        },
        success: function(result){
            console.log(result);
            // var response = JSON.parse(result);
            var likecount = result.votecount;
            $('#spnlk_'+x+' img').attr('src','/images/heart.png');
            $('#spnlk_'+x).attr('onClick','unlike('+x+')');
            $('#lkcnt_'+x).text(likecount);
        }});
}

// unLike FUnctions for user
function unlike(x)
{
 $.ajax({
    url: "/unlike",
    method: 'post',
    data: {
        '_token': $('input[name=_token]').val(),'noteid': x,
    },
    success: function(result){
        console.log(result);
        // var response = JSON.parse(result);
        var likecount = result.votecount;
        $('#spnlk_'+x+' img').attr('src','/images/heart-empty.png');
        $('#spnlk_'+x).attr('onClick','like('+x+')');
        $('#lkcnt_'+x).text(likecount);
    }});
}

// Comment function for Notes

function comment(x)
{
    var comment = $('#ncomt').val();
    $.ajax({
       url: "/comment",
       method: 'post',
       data: {
           '_token': $('input[name=_token]').val(),'noteid': x, 'comment': comment,
       },
       success: function(result){
           console.log(result);
           $('#ncomt').val('');
           getComment(x);
       }});
}

// function to get Comments

function getComment(x)
{
    var comment = $('#ncomt').val();
    $.ajax({
       url: "/getComment",
       method: 'post',
       data: {
           '_token': $('input[name=_token]').val(),'noteid': x
       },
       success: function(result)
       {
           console.log(result);
           var branchName = $('#comments_box').empty();
           $.each(result.comments, function(i, comment)
           {
               var com_div = '<div class="well"><span><strong>'+comment.username+'</strong></span><div>'+comment.comment+'<small class="pull-right">'+comment.created_at+'</small></div></div>';
               $('#comments_box').append(com_div);
            });
       }});
}
