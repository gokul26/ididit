
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
