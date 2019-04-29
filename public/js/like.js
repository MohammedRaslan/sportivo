var postId = 0;

$('.like').on('click', function(event){

    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;

    $.ajax({
        method : 'POST',
        url    : urlLike,
        data   : {isLike: isLike, postId: postId, _token: token}
    })
    .done(function(){
        event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'Unlike' : 'Like' : event.target.innerText == 'Dislike' ? 'You Dont Like This Post' : 'Dislike'; 
        if(isLike){
            event.target.nextElementSibling.innerText = 'Dislike';
        } else{
            event.target.nextElementSibling.innerText =  'Like'; 
        }
    });
});