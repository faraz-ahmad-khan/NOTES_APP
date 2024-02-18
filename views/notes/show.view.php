<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 relative">
        <p class="mb-4">
            <a class="rounded-md text-white bg-violet-800 px-2 py-2 w-20 hover:bg-violet-700 font-medium" href="/notes">Go Back</a>
        </p>
        <div class="border-double border-2 border-[#3c3c3c] px-2 py-2 rounded-lg pb-14 bg-gray-900 text-white">
          <div class="flex justify-between">
            <div>
              <h3 class="px-2 underline text-yellow-400 text-lg">
                <?= htmlspecialchars($note['title']) ?>
              </h3>
              <h6 class="px-2 text-[#e8e8e8]-300 text-sm"><i>By Charlotte Brontë</i></h6>
            </div>
            <div>
              <p class="mx-2 text-[#e8e8e8]-300 text-sm border-dashed border-b-2 border-[#3c3c3c]"><i>Created on:</i> 20/10/2019</p>
            </div>
          </div>
          <p class="px-2 py-2 text-whitesmoke font-light">
            <?= htmlspecialchars($note['body']) ?>
          </p>
          <div class="mb-4 px-2 py-2 absolute bottom-5 right-12 inline-flex flex-wrap">
            <form action="/note" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="id" value="<?= $note['id'] ?>">
              <button type="submit" class="rounded-md text-white text-center bg-red-800 px-2 py-2 w-20 hover:bg-red-700 font-medium">Delete</button>
            </form>
            <a class="rounded-md text-white text-center bg-violet-800 px-2 py-2 w-20 hover:bg-violet-700 font-medium ml-2" href="/note/edit?id=<?= $note['id'] ?>">Update</a>
          </div>
        </div>
        
    </div>
  </main>

<?php require base_path('views/partials/footer.php') ?>
