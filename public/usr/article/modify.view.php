<?php 
  $pageTitle = "${id}번 게시물 수정"
?>
<?php include_once __DIR__ . "/../head.php" ?>
  <hr>
  <form action="doModify.php?id=<?=$article['id']?>">
  <input type="hidden" name = "id" value = "<?=$article['id']?>">
  <div>
    <span>번호</span>
    <span><?=$article['id']?></span>
  </div>
  <div>
    <span>제목</span>
    <input require placeholder = '제목을 입력해주세요.' type="text" name = "title" value = "<?=$article['title']?>">
  </div>
  <div>
    <span>내용</span>
    <textarea require placeholder = '내용을 입력해주세요.' name="body"><?=$article['body']?></textarea>
  </div>
  <div>
    <input type="submit" value = "글수정">
  </div>
  </form>
<?php include_once __DIR__ . "/../foot.php" ?>