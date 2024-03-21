<?php

require '../core.php';

if (isset($_POST['comment_posted'])) {

	$comment_item = clearGetData($_POST['comment_item']);
	$comment_user = clearGetData($_POST['comment_user']);
	$comment_text = clearGetData($_POST['comment_text']);

	if (!empty($comment_item) && !empty($comment_user) && !empty($comment_text)) {

		$sqlQuery = "INSERT INTO comments (item_id, user_id, body, created_at, updated_at) VALUES ('$comment_item', '$comment_user', '$comment_text', CURRENT_TIME, null)";
		$sentence = $connect->prepare($sqlQuery);
		$sentence->execute();

		$inserted_id = $connect->lastInsertId();

		$sentence = $connect->prepare("SELECT comments.*, users.user_name, users.user_email, users.user_avatar FROM comments LEFT JOIN users ON users.user_id = comments.user_id WHERE id=" . $inserted_id . " LIMIT 1");
		$sentence->execute();
		$inserted_comment = $sentence->fetch();

		if ($inserted_id) {

			$comment = "<article class='comment-box uk-comment uk-border-rounded uk-margin-bottom'>
			<header class='uk-comment-header uk-margin-remove uk-position-relative'>
			<div class='uk-grid-medium uk-flex-middle' uk-grid>
			<div class='uk-width-auto'>
			<div class='uk-cover-container uk-border-rounded'>
			    <img class='uk-comment-avatar' src='".$urlPath->image($inserted_comment['user_avatar'])."' uk-cover>
			    <canvas width='80' height='80'></canvas>
			</div>
			</div>
			<div class='uk-width-expand'>
			<h5 class='uk-comment-title uk-margin-remove'>" . echoOutput($inserted_comment['user_name']) . " <span class='uk-margin-small-left uk-text-muted uk-text-small'>". formatDate($inserted_comment['created_at']) ."</span></h5>
			<p class='uk-comment-meta uk-margin-remove-top'>". echoOutput($inserted_comment['body']) ."</p>
			</div>
			</div>
			<div class='uk-position-top-right uk-position-small'>
			<a class='reply-btn' href='#' data-id='" . $inserted_comment['id'] . "'><span uk-icon='reply'></span></a>
			</div>
			</header>
			</article>

			<form class='reply_form uk-margin-bottom uk-margin-small-top' id='comment_reply_form_" . $inserted_comment['id'] . "' data-id='" . $inserted_comment['id'] . "' data-user='" . $comment_user . "'>
			<textarea class='uk-textarea uk-border-rounded' name='reply_text' id='reply_text' cols='30' rows='4' required></textarea>
			<button class='uk-button uk-button-primary uk-border-rounded uk-margin-small-top submit-reply'>Submit reply</button>
			</form>";

			$comment_info = array(
				'comment' => $comment,
				'comments_count' => getCommentsCountById($comment_item)
			);
			echo json_encode($comment_info);
			exit();
		} else {
			echo "error";
			exit();
		}

	} else {
		echo "error";
		exit();
	}

}
// If the user clicked submit on reply form...
if (isset($_POST['reply_posted'])) {

	$reply_user = clearGetData($_POST['reply_user']);
	$reply_text = clearGetData($_POST['reply_text']);
	$comment_id = clearGetData($_POST['comment_id']);

	if (!empty($reply_user) && !empty($reply_text) && !empty($comment_id)) {

	// insert reply into database
	$sqlQuery = "INSERT INTO replies (user_id, comment_id, body, created_at, updated_at) VALUES ('$reply_user', '$comment_id', '$reply_text', CURRENT_TIME, null)";

	$sentence = $connect->prepare($sqlQuery);
	$sentence->execute();

	$inserted_id = $connect->lastInsertId();

	$sentence = $connect->prepare("SELECT replies.*, users.user_name, users.user_email, users.user_avatar FROM replies LEFT JOIN users ON users.user_id = replies.user_id WHERE id=" . $inserted_id . " LIMIT 1");
	$sentence->execute();
	$inserted_reply = $sentence->fetch();

	if ($inserted_id) {

		$reply = "<li><article class='reply-box uk-comment uk-border-rounded uk-margin-bottom'>
		<header class='uk-comment-header uk-margin-remove'>
		<div class='uk-grid-medium uk-flex-middle' uk-grid>
		<div class='uk-width-auto'>
		<div class='uk-cover-container uk-border-rounded'>
		    <img class='uk-comment-avatar' src='".$urlPath->image($inserted_reply['user_avatar'])."' uk-cover>
		    <canvas width='80' height='80'></canvas>
		</div>
		</div>
		<div class='uk-width-expand'>
		<h5 class='uk-comment-title uk-margin-remove'>" . echoOutput($inserted_reply['user_name']) . " <span class='uk-margin-small-left uk-text-muted uk-text-small'>". formatDate($inserted_reply['created_at']) ."</span></h5>
		<p class='uk-comment-meta uk-margin-remove-top'>". echoOutput($inserted_reply['body']) ."</p>
		</div>
		</div>
		</header>
		</article></li>";

		echo $reply;
		exit();
	} else {
		echo "error";
		exit();
	}

	} else {
		echo "error";
		exit();
	}

}

?>