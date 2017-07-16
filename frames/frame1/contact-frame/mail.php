<?php

/* ここからCSRF対策用関数 */

function setToken() {
	$token = sha1(uniqid(mt_rand(), true));
	$_SESSION['token'] = $token;
}

function checkToken() {
	if($_SESSION['token'] !== $_POST['token']) {
		echo 'ERROR';
		exit;
	}
}

/* ここまでCSRF対策用関数 */



/* ここからPOST処理 */

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['token'])) { 
	checkToken();
	if(isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['last_name2']) && isset($_POST['first_name2']) && isset($_POST['phone_number']) && isset($_POST['mail_address1']) && isset($_POST['mail_address2']) && (isset($_POST['contact_type1']) || isset($_POST['contact_type2']) || isset($_POST['contact_type3']) || isset($_POST['contact_type4']))) {

		for($i = 1; $i <= 4; $i++) {
			if(isset($_POST['contact_type' . $i])) {
				if(empty($contactTypeSet)) {
					$contactType .= $_POST['contact_type' . $i];
					$contactTypeSet = True;
				} else {
					$contactType .= '/' . $_POST['contact_type' . $i];
				}
			} 
		}

		$last_name = h($_POST['last_name']);
		$first_name = h($_POST['first_name']);
		$last_name2 = h($_POST['last_name2']);
		$first_name2 = h($_POST['first_name2']);
		$phone_number = h($_POST['phone_number']);
		$mail_address1 = h($_POST['mail_address1']);
		$mail_address2 = h($_POST['mail_address2']);
		$contact_type = h($contactType);
		$description = h($_POST['description']);

		/*--- ここからValidation処理 ---*/
		
		if (empty($mail_address1) || empty($mail_address2)) {
			if (empty($mail_address1)) {
				$error['email1Empty'] = "「メールアドレス」を入力してください。";
			}
			if (empty($mail_address2)) {
				$error['email2Empty']  = "「メールアドレス(確認用)」を入力してください。";		
			}
		} elseif ($mail_address1 !== $mail_address2) {
			$error['emailMatch'] = "メールアドレスが一致しません。";
		} elseif (!preg_match('|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|', $mail_address1)) {
			$error['emailFormat'] = "「メールアドレス」の形式が正しくありません。";
		}

		if (empty($last_name) || empty($first_name)) {
			$error['nameEmpty'] = "「氏名(漢字)」を入力してください。";
		}

		if (empty($last_name2) || empty($first_name2)) {
			$error['name2Empty'] = "「氏名(フリガナ)」を入力してください。";
		}

		if (empty($phone_number)) {
			$error['phoneEmpty'] = "「電話番号」を入力してください。";
		} elseif (!preg_match("/^[0-9]+$/", $phone_number)) {
			$error['phoneFormat'] = "「電話番号」の形式が正しくありません。";
		}

		if (empty($contact_type)) {
			$error['contact_typeEmpty'] = "「お問い合わせ内容」を入力してください。";
		}

		if (empty($description)) {
			$error['descriptionEmpty'] = "「お問い合わせ詳細」を記入してください。";
		}

		/*--- ここまでValidation処理 ---*/

		if (empty(count($error))) {

			function funcManagerAddress($userEmail, $buildingName, $last_name, $first_name, $last_name2, $first_name2, $phone_number, $mail_address1,$contact_type,$description){
	   	 		$mailto =  $userEmail;       //送信先メールアドレス
	    		$subject = $buildingName . '|お問い合わせ';  //メール件名
	    		//本文
	    		$content="【Wonder Homes】に登録されている" . $buildingName . "へお問い合わせがありました。\n" . "お問い合わせ内容は以下の通りです。\n" ."【相手のお名前】： ".$last_name . $first_name ."\n"."【フリガナ】： " . $last_name2 . $first_name2 . "\n" . "【電話番号】： " . $phone_number . "\n" . "【メールアドレス】： ".$mail_address1."\n"."【お問い合わせ内容】： ".$contact_type."\n"."【メッセージ】： ".$description."\n";
	    		$mailfrom="From:" .mb_encode_mimeheader($last_name . $first_name) ."<".$userEmail.">";
	    		if(mb_send_mail($mailto,$subject,$content,$mailfrom) == true){
	        		$managerFlag = "○";
	    		}else{
	        		$managerFlag = "×";
	    		}
	    		return $managerFlag;
			};

			function funcContactAddress($userEmail, $buildingName, $contact_name, $last_name, $first_name, $last_name2, $first_name2, $phone_number, $mail_address1,$contact_type,$description){  
	    		//ヘッダー用変数
	    		$mailto = $mail_address1;       //送信先メールアドレス
	    		$subject = $buildingName . '|確認メール';   //メール件名
	    		//本文
	    		$content="お問い合わせ誠にありがとうございます。\n" . "このメールは" . $buildingName . "の管理者「" . $contact_name . "」宛にお問い合わせいただいた確認メールになります。\n" . "以下の内容が送信内容になりますので、改めて確認の上、返信をお待ちください。\n" ."【お名前】： ".$last_name . $first_name ."\n"."【フリガナ】： " . $last_name2 . $first_name2 . "\n" . "【電話番号】： " . $phone_number . "\n" . "【メールアドレス】： ".$mail_address1."\n"."【お問い合わせ内容】： ".$contact_type."\n"."【メッセージ】： ".$description."\n";
	    		$mailfrom="From:" .mb_encode_mimeheader($contact_name) ."<".$userEmail.">";
		     
		    	if(mb_send_mail($mailto,$subject,$content,$mailfrom) == true){
	        		$contactFlag = "○";
	    		}else{
	        		$contactFlag = "×";
	    		}
	    		return $contactFlag;
			};

			//送信者用自動返信メール送信
			$contactAddress = funcContactAddress($userEmail, $buildingName, $contact_name, $last_name, $first_name, $last_name2, $first_name2, $phone_number, $mail_address1,$contact_type,$description);
			//管理者受信用メール送信
			$managerAddress = funcManagerAddress($userEmail, $buildingName, $last_name, $first_name, $last_name2, $first_name2, $phone_number, $mail_address1,$contact_type,$description);
	 
			if($contactAddress === "○" && $managerAddress === "○" ){
	    		//送信メール送信・自動返信が成功したら完了ページへリダイレクト
	    		$submitConfirm = '○';
			}else{
	    		//送信メール送信・自動返信のいずれかが失敗したらエラー出力
	   			$submitConfirm = '×';
			}
		}

	} else {

		if($_POST['mail_address1'] !== $_POST['mail_address2']) {
			$mailNotmatch = True;
		}

		$submitPosts = ['last_name', 'first_name', 'last_name2', 'first_name2', 'phone_number', 'mail_address1', 'mail_address2'];
		$submitPostsConfirm = [];

		foreach($submitPosts as $submitPost) {
			if(empty($_POST[$submitPost])) {
				$submitPostsConfirm[$submitPost] = True;
			}
		} 

	}
} else {
	setToken();
}

/* ここまでPOST処理 */