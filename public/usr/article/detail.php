<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';
  $id = getIntValueOr($_GET['id'], 0);

  if($id == 0){
    jsHistoryBackExit("번호를 입력해주세요.");
  }
 
  $sql = DB__secSql();
  $sql->add("SELECT *");
  $sql->add("FROM article AS A");
  $sql->add("WHERE A.id = ?", $id);
  
  $article = DB__getRow($sql);

  $memberId = isset($_SESSION['loginedMemberId']) ? intval($_SESSION['loginedMemberId']) : 0;
  
  if ($article == null){
    jsHistoryBackExit("${id}번 게시물은 존재하지 않습니다");
  }

  $repliSql = DB__secSql();
  $repliSql->add("SELECT *");
  $repliSql->add("FROM reply AS R");
  $repliSql->add("WHERE R.articleId = ?", $id);
  $repliSql->add("ORDER BY R.id DESC");

  $replyes = DB__getRows($repliSql);

?>
<?php
  $pageTitle = "게시물 상세내용, ${id}번 게시물";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
  <div>
    <a href="modify.php?id=<?=$article['id']?>">수정</a>
    <a onclick = "if(!confirm('삭제 하시겠습니까?')){return false;}" href="doDelete.php?id=<?=$article['id']?>">삭제</a>
  </div>
  <hr>
    <div>번호 : <?=$article['id']?></div>
    <div>작성 : <?=$article['regDate']?></div>
    <div>수정 : <?=$article['updateDate']?></div>
    <div>제목 : <?=$article['title']?></div>
    <div>내용 : <?=$article['body']?></div>
    <div>좋아요 : <?=$article['like_count']?></div>
    <button onclick="location.href = '../like/like.php?articleId=<?=$article['id']?>'">좋아요</button>
    <hr>
    <div>댓글 작성</div>
    <?php
    if(!isset($memberId)){
      echo "로그인후 사용가능합니다.";
      exit;
    }
    ?>
    <form action="../reply/doWrite.php?articleId=<?=$article['id']?>">
    <input type="hidden" name = "articleId" value = "<?=$article['id']?>">
    <div>
      <span>내용</span>
      <textarea required placeholder = '내용을 입력해주세요.' name="body"></textarea>
    </div>
    <div>
      <input type="submit" value = "댓글작성">
    </div>
    </form>
    <div>
      <?php foreach ($replyes as $reply){ ?>
        댓글 : <?=$reply['body']?><br>
        좋아요 : <?=$reply['like_count']?><br>
        <button onclick="location.href = '../like/replyLike.php?replyId=<?=$reply['id']?>&articleId=<?=$article['id']?>'">좋아요</button>
        <a href="../reply/modify.php?id=<?=$reply['id']?>">수정</a>
        <a onclick = "if(!confirm('삭제 하시겠습니까?')){return false;}" href="../reply/doDelete.php?id=<?=$reply['id']?>">삭제</a><br>
      <?php } ?> 
    </div>
  <?php require_once __DIR__ . "/../foot.php"; ?>
