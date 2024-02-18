<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <?php if($notes) : ?>
     <ul class="list-[lower-roman] w-1/3 px-8 py-2">
        <?php foreach($notes as $note): ?>
            <li class="text-violet-800 hover:text-violet-700 hover:underline px-2 py-2 font-normal">
                <a href="/note?id=<?= $note['id'] ?>" class="">
                    <?=htmlspecialchars($note['title'])?>
                </a>
            </li>
        <?php endforeach ?>
     </ul>
     <?php else : ?>
      <h6 class="text-lg text-blue-800">Don't have a Note? Create one!</h6>
     <?php endif ?>
     <p class="mt-6">
          <a href="/note/create" class="rounded-md text-white bg-violet-800 px-2 py-2 w-20 hover:bg-violet-700 font-medium">󠀫󠀫+Create Note</a>
     </p>
    </div>
  </main>

<?php require base_path('views/partials/footer.php') ?>
