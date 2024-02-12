<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
     <ul class="list-disc bg-white w-1/3 rounded-lg px-8 py-2 border-solid border-[1px] border-[#b7b7b7]">
        <?php foreach($notes as $note): ?>
            <li class="text-violet-800 hover:bg-violet-800 hover:text-white px-2 py-2 font-normal border-solid border-b-[1px] border-[#b7b7b7]">
                <a href="/note?id=<?= $note['id'] ?>" class="">
                    <?=htmlspecialchars($note['title'])?>
                </a>
            </li>
        <?php endforeach ?>
     </ul>
     <p class="mt-6">
          <a href="/note/create" class="rounded-md text-white bg-violet-800 px-2 py-2 w-20 hover:bg-violet-700 font-medium">󠀫󠀫+Create Note</a>
     </p>
    </div>
  </main>

<?php require base_path('views/partials/footer.php') ?>
