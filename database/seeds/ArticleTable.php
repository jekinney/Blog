<?php

use App\Blogs\Models\Category;
use App\Blogs\Models\Article;
use Illuminate\Database\Seeder;

class ArticleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima sequi adipisci assumenda, tempore mollitia nesciunt repellat hic molestiae, ex ipsa eius est, laudantium maiores rem corrupti nulla doloremque autem sit illo ipsum. Consequatur similique reprehenderit quisquam nisi dolore delectus sapiente molestias eius excepturi, id quia laboriosam dolores minima beatae, non culpa aperiam nobis a fuga voluptates. Minima sed deserunt fugiat aspernatur eius eveniet suscipit fugit numquam culpa porro rerum impedit tempora ex, molestiae perferendis architecto vel repudiandae officia consequatur quibusdam cupiditate. Earum dolorum accusantium, libero. Unde architecto quas, modi velit, suscipit quasi libero asperiores dolor provident placeat dolorum ullam quaerat error aliquid nam minima esse omnis eveniet quis, maiores tempore itaque natus. Necessitatibus tempore, aliquam saepe corporis cum. Fugit voluptate et officiis, quidem illo sed pariatur fugiat hic. Enim, aperiam, labore. Autem molestias, minus labore animi error, ab quibusdam. Quibusdam qui dicta illum neque nemo modi sapiente impedit aperiam exercitationem veritatis, rem in nulla omnis! Fuga quidem, ipsa nemo repudiandae provident iure deserunt iusto quos excepturi officiis, culpa eaque, incidunt. Enim et nobis odit, sapiente eius rem officia non fugit magnam vel provident eligendi, nostrum laudantium quam fuga aspernatur in, culpa ab possimus amet recusandae alias! Quasi tempora laudantium sequi ut nulla quibusdam iure quia, officia, soluta aliquid sapiente, voluptates, corporis repudiandae placeat totam illum harum eaque recusandae minima id excepturi exercitationem? Quaerat architecto voluptates doloribus, repellat molestias consequatur cum, molestiae impedit? Rem facilis voluptate et. Atque pariatur totam explicabo quas, velit, rerum quidem voluptatem fugiat cum voluptates quo labore? Vitae voluptas ratione, quisquam quae molestias magnam magni nostrum aliquid, tempore unde distinctio quam nesciunt animi ab recusandae error aut expedita illo. Provident veniam odit nisi, illum voluptatum vitae soluta enim quos alias molestias porro magnam error doloribus culpa ex voluptate, ipsum eos fugiat. Consequatur doloremque omnis laboriosam iure, quaerat. Quo magni officiis facere similique, vel nemo pariatur ut reprehenderit labore ducimus, aspernatur nostrum est ipsum facilis excepturi nobis harum voluptatibus autem odio molestias velit eum doloremque aliquam! Possimus alias, illo ipsum voluptatem maiores veniam laborum! Sed ex alias impedit quam consequuntur tenetur eius, nesciunt enim inventore, fuga sit maxime eum culpa, aut expedita nisi est iure. Possimus facilis quae ab voluptatum, qui facere fugit eum numquam saepe quisquam aut accusantium itaque iure doloremque illo voluptatem deserunt, odit dolore dignissimos illum. Quisquam esse aspernatur est, nostrum natus expedita, aperiam vero corrupti quod, quam magni harum modi recusandae mollitia. Recusandae culpa eum omnis, placeat deleniti nostrum, non eius voluptate reprehenderit sed atque ipsum consectetur totam, possimus facilis natus labore! Eius quaerat minima a! Vero repellendus consequatur, aliquam unde consectetur accusantium velit eveniet totam quibusdam esse! Commodi odio dicta nisi odit quam perferendis aliquam porro, sint nemo necessitatibus quos qui pariatur voluptate mollitia nihil cumque vero, veritatis quibusdam dolorem! Iste vero neque debitis nobis aperiam, repudiandae numquam vel ut eos, beatae mollitia impedit esse quisquam optio magnam, rem in ratione iusto nostrum sed architecto necessitatibus consequatur aspernatur. Vero cumque accusamus aliquid debitis quos soluta, laborum, deleniti perferendis nulla nesciunt deserunt nisi. Aliquid!';

        foreach(Category::all() as $category) 
        {
            foreach(range(1,8) as $make)
            {
                Article::create([
                	'category_id' => $category->id,
        	    	'author_id' => 1,
        	    	'title' => $make.' Lorem ipsum dolor sit amet',
        	    	'overview' => $make.' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, modi',
        	    	'body' => $body,
                    'publish_at' => \Carbon\Carbon::now()->toDateTimeString(),
        	    	'commentable' => true,
            	]);
            }
        }
    }
}
