<?php include 'conn.php';
session_start();
if(!isset($_SESSION["UserID"])){
  header('Location: login');
}
// echo $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'page/header.php'; ?>
<body>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="bootstrap" viewBox="0 0 118 94">
    <title>Bootstrap</title>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
  </symbol>
  <symbol id="people-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
  </symbol>
  <symbol id="collection" viewBox="0 0 16 16">
    <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
  </symbol>
  <symbol id="toggles2" viewBox="0 0 16 16">
    <path d="M9.465 10H12a2 2 0 1 1 0 4H9.465c.34-.588.535-1.271.535-2 0-.729-.195-1.412-.535-2z"/>
    <path d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm.535-10a3.975 3.975 0 0 1-.409-1H4a1 1 0 0 1 0-2h2.126c.091-.355.23-.69.41-1H4a2 2 0 1 0 0 4h2.535z"/>
    <path d="M14 4a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
  </symbol>
</svg>
<div class="col-lg-12">
<?php include 'page/navbar.php' ?>
  <div class="container bg-white shadow p-3 mb-5 bg-body rounded" style="margin-top: 80px;">
    <div class="px-4 py-5 my-5 text-center">
      <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="display-5 fw-bold">ระบบฝากถอนเงิน</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">ฝาก-ถอนที่รวดเร็วทันใจเพียงไม่กี่นาที ลูกค้าก็สามารถทำรายการได้แล้ว เล่นเกมคาสิโนกับเราได้ทันที เรายินดีให้บริการลูกค้าด้วยความเต็มใจ และลูกค้าจะไม่ผิดหวังเมื่อเข้ามาเล่นกับเว็บเรา ซึ่งเราได้รวมความหลากหลายของเกมพนันออนไลน์จากคาสิโนออนไลน์มาไว้ในโลกออนไลน์ .</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <button type="button" class="btn btn-primary btn-lg px-4 gap-3">ฝากเงิน</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">ถอนเงิน</button>
        </div>
      </div>
    </div>
  </div>
  <div class="container px-4 py-5 bg-white shadow p-3 mb-5 bg-body rounded" id="featured-3">
    <h2 class="pb-2 border-bottom">คุณสมบัติของระบบเรา.</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"></use></svg>
        </div>
        <h2>รองรับมือถือทุกรุ่น</h2>
        <p>สามารถรองรับทุกเครื่องมือการเล่น คอมพิวเตอร์ โทรศัพท์เคลื่อนที่ แท็บเล็ต ทุกระบบการใช้งาน ทุกเครือข่ายที่เชื่อมต่อกับทางอินเทอร์เน็ต ลูกค้าสามารถเข้าได้ทุกทางเข้า เพื่อเล่นพนันออนไลน์ได้ทุกเกม </p>
        <a href="#" class="btn btn-dark">
          Call to action
          <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"></use></svg>
        </div>
        <h2>ฝากถอนรวดเร็ว</h2>
        <p>ระบบของเราทำงานด้วย AI ซึ่งเป็นระบบฝากถอนที่ไวที่สุดที่เคยมีมา หากกดถอนเงินจะเข้าทันที ไม่ต้องรอแอดมินอนุมัติรายการของคุณ คุณสามารถทำรายการฝากถอนได้ด้วยตนเอง ไม่ต้องทักหาแอดมิน.</p>
        <a href="#" class="btn btn-dark">
          Call to action
          <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
        </div>
        <h2>ระบบอัตโนมัติ</h2>
        <p>ระบบฝากถอนเงินของทางเรานั้น เป็นระบบฝากถอนเงินอัตโนมัติ เร็วทันใจ ไม่ต้องรอใคร ฝากถอนที่ไวที่สุด เจ้าแรกของโลก มีทีมงานคอย Support ตลอด 24 ชม. คุณไม่ควรพลาดกับระบบฝากถอนดีแบบนี้.</p>
        <a href="#" class="btn btn-dark">
          Call to action
          <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
    </div>
  </div>
  <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php include 'page/footer.php'; ?>
  </div>
</body>
</html>