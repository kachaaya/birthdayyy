<?php
$c = require __DIR__ . '/config.php';
$h = fn($s) => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
$hasAudio = !empty($c['audio']) && file_exists(__DIR__ . '/' . $c['audio']);
?><!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $h($c['title']) ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Mali:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="stars"></div>

<!-- ฉาก 1: เค้ก -->
<section class="scene active" id="sceneCake">
  <h1 class="title"><?= $h($c['title']) ?></h1>
  <div class="stage" id="cakeStage">
    <div class="tilt">
      <div class="spin" id="cake"></div>
      <div class="flame-wrap" id="flameWrap">
        <div class="flame" id="flame"></div>
        <div class="smoke"><i></i><i></i><i></i><i></i></div>
      </div>
    </div>
  </div>
  <p class="hint" id="hint">แตะที่เทียนหรือกดปุ่มด้านล่างได้เลย</p>
  <button class="btn" id="blowBtn">💨 เป่าเทียนเลย!</button>
</section>

<!-- ฉาก 2: ซองจดหมาย -->
<section class="scene" id="sceneEnv">
  <div class="envelope" id="envelope">
    <div class="env-back"></div>
    <div class="env-flap"></div>
    <div class="env-front"></div>
    <button class="seal" id="seal" aria-label="เปิดซอง">❤</button>
    <p class="env-text"><?= $h($c['seal_text']) ?></p>
  </div>
  <p class="hint">กดที่หัวใจเพื่อเปิดซอง</p>
</section>

<!-- ฉาก 3: จดหมาย -->
<section class="scene" id="sceneLetter">
  <div class="paper" id="paper">
    <div class="letter-text"><?= nl2br($h($c['letter'])) ?></div>
    <?php if ($hasAudio): ?>
      <div class="audio-box">
        <span>🎧 เสียงจากกัส</span>
        <audio controls preload="metadata" src="<?= $h($c['audio']) ?>"></audio>
      </div>
    <?php else: ?>
      <div class="audio-box muted">วางไฟล์เสียงชื่อ <b><?= $h($c['audio']) ?></b> ไว้โฟลเดอร์เดียวกับ index.php เพื่อให้เครื่องเล่นเสียงปรากฏ</div>
    <?php endif; ?>
    <div class="actions">
      <button class="btn small" id="shareBtn">🔗 ส่งต่อ / คัดลอกลิงก์</button>
      <button class="btn small ghost" id="replayBtn">🎂 ดูอีกครั้ง</button>
    </div>
    <div class="toast" id="toast">คัดลอกลิงก์แล้ว ✔</div>
  </div>
</section>

<script src="app.js"></script>
</body>
</html>