<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST" class="w-1/2">
            <input required type="text" name="title" id="title" value="<?= $_POST['title'] ?? '' ?>" placeholder="Title..." class="px-2 py-2 rounded-lg w-full focus:outline-none mb-2 border-solid border-[1px] border-[#b7b7b7]">
                <?php if (isset($errors['title'])) : ?>
                    <h1 class="text-red-600 text-xs px-2 mb-2"><?= $errors['title'] ?></h1>
                <?php endif; ?>
            <textarea required name="body" id="body" cols="30" rows="10" class="px-2 py-2 rounded-lg w-full border-solid border-[1px] border-[#b7b7b7] focus:outline-none" placeholder="Type your note here..."><?= $_POST['body'] ?? '' ?></textarea>
                <?php if (isset($errors['body'])) : ?>
                        <h1 class="text-red-600 text-xs px-2 mb-2"><?= $errors['body'] ?></h1>
                <?php endif; ?>
            <button class="rounded-md text-white bg-violet-800 px-2 py-2 w-20 hover:bg-violet-700 font-medium" type="submit">
                Create
            </button>
        </form>
        
    </div>
  </main>

<?php require base_path('views/partials/footer.php') ?>
