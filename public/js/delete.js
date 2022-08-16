function deleteComment(comment_id) {
    const form = document.getElementById('form_' + comment_id);  //各投稿ごとのdeleteのformを取得
    const is_submit = confirm('本当に削除してもよろしいですか？'); //はいの場合true,いいえの場合falseをis_submitに格納
    
    if(is_submit) {  //is_submitがtrueの場合のみ、{}の中の処理が行われる
        form.submit();  //deleteするformをsubmitする
    }
}

function deleteReview(review_id) {
    const form = document.getElementById('form_' + review_id);  //各投稿ごとのdeleteのformを取得
    const is_submit = confirm('本当に削除してもよろしいですか？'); //はいの場合true,いいえの場合falseをis_submitに格納
    
    if(is_submit) {  //is_submitがtrueの場合のみ、{}の中の処理が行われる
        form.submit();  //deleteするformをsubmitする
    }
}
