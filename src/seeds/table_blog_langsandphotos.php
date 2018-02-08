<?php
namespace blog\blogsystem;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class table_blog_langsandphotos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// CATEGORIES

// Photos
        DB::table('photos')->insert([
            'name'             => 'blogcategory-1.jpg',
            'original_name'    => 'blogcategory-1.jpg',
            'photostable_id'   => 1,
            'photostable_type' => 'blog\blogsystem\Models\Blogcategory',

            'default'          => 1,
        ]);

        DB::table('photos')->insert([
            'name'             => 'blogcategory-2.jpg',
            'original_name'    => 'blogcategory-2.jpg',
            'photostable_id'   => 2,
            'photostable_type' => 'blog\blogsystem\Models\Blogcategory',
            'default'          => 1,
        ]);

        DB::table('photos')->insert([
            'name'             => 'blogcategory-3.jpg',
            'original_name'    => 'blogcategory-3.jpg',
            'photostable_id'   => 2,
            'photostable_type' => 'blog\blogsystem\Models\Blogcategory',
            'default'          => 0,
        ]);

        DB::table('photos')->insert([
            'name'             => 'blogcategory-4.jpg',
            'original_name'    => 'blogcategory-4.jpg',
            'photostable_id'   => 2,
            'photostable_type' => 'blog\blogsystem\Models\Blogcategory',
            'default'          => 0,
        ]);

// lenguajes

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 1,
            'langstable_id'   => 1,
            'langstable_type' => 'blog\blogsystem\Models\Blogcategory',
            'description'     => 'blogcategory-1-es',
            'name'            => 'blogcategory-1es',
            'uri'             => 'blogcategory-1',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 2,
            'langstable_id'   => 1,
            'langstable_type' => 'blog\blogsystem\Models\Blogcategory',
            'description'     => 'blogcategory-1-en',
            'name'            => 'blogcategory-1en',
            'uri'             => 'blogcategory-1en',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 3,
            'langstable_id'   => 1,
            'langstable_type' => 'blog\blogsystem\Models\Blogcategory',
            'description'     => 'blogcategory-1-fr',
            'name'            => 'blogcategory-1fr',
            'uri'             => 'blogcategory-1fr',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 1,
            'langstable_id'   => 2,
            'langstable_type' => 'blog\blogsystem\Models\Blogcategory',
            'description'     => 'blogcategory-2description-es',
            'name'            => 'blogcategory-2',
            'uri'             => 'blogcategory-2',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 2,
            'langstable_id'   => 2,
            'langstable_type' => 'blog\blogsystem\Models\Blogcategory',
            'description'     => 'blogcategory-2description-en',
            'name'            => 'blogcategory-2en',
            'uri'             => 'blogcategory-2en',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 3,
            'langstable_id'   => 2,
            'langstable_type' => 'blog\blogsystem\Models\Blogcategory',
            'description'     => 'blogcategory-2description-fr',
            'name'            => 'blogcategory-2fr',
            'uri'             => 'blogcategory-2fr',

        ));

        // POSTS
        // photos

        DB::table('photos')->insert([
            'name'             => 'blog-post-1.jpg',
            'original_name'    => 'blog-post-1.jpg',
            'photostable_id'   => 1,
            'photostable_type' => 'blog\blogsystem\Models\Post',

            'default'          => 1,
        ]);

        DB::table('photos')->insert([
            'name'             => 'blog-post-2.jpg',
            'original_name'    => 'blog-post-2.jpg',
            'photostable_id'   => 2,
            'photostable_type' => 'blog\blogsystem\Models\Post',
            'default'          => 1,
        ]);

        DB::table('photos')->insert([
            'name'             => 'blog-post-3.jpg',
            'original_name'    => 'blog-post-3.jpg',
            'photostable_id'   => 3,
            'photostable_type' => 'blog\blogsystem\Models\Post',

            'default'          => 1,
        ]);

        DB::table('photos')->insert([
            'name'             => 'blog-post-4.jpg',
            'original_name'    => 'blog-post-4.jpg',
            'photostable_id'   => 4,
            'photostable_type' => 'blog\blogsystem\Models\Post',
            'default'          => 1,
        ]);

        // Lenguajes dos post en la categoria 1

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 1,
            'langstable_id'   => 1,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id lacinia sem. Nam id varius turpis, et blandit ante. Aliquam condimentum vulputate elit non venenatis. Cras sagittis ipsum ut eros convallis posuere. Aenean non sem egestas ante semper vehicula. Nunc diam nunc, consectetur non odio eu, tincidunt ultrices erat. Maecenas sapien libero, consequat vel dignissim eget, viverra sed nunc. Vivamus id purus luctus, tincidunt orci ac, auctor ex. Nullam velit risus, aliquam eu placerat vel, finibus eget orci. Phasellus volutpat, velit vel imperdiet varius, erat magna condimentum quam, et tempus odio arcu nec augue. Nulla et vulputate felis. Maecenas eu congue nunc, eget tincidunt eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur tincidunt vestibulum diam in feugiat.

Donec pellentesque turpis lacus, accumsan egestas libero tristique sit amet. Duis sem diam, pretium at ipsum a, hendrerit auctor nulla. Pellentesque tincidunt pulvinar libero nec vehicula. Fusce tempus eros ac sapien ornare pharetra. Morbi interdum leo ut enim posuere feugiat. Quisque condimentum auctor odio, et molestie arcu vestibulum accumsan. Vivamus eu vulputate risus. Suspendisse finibus mattis tempus. Curabitur scelerisque diam lorem, ut sollicitudin lectus vehicula ut. Nullam viverra neque a dolor tempus faucibus. Suspendisse eget volutpat elit.

In accumsan, sem id pharetra feugiat, lorem lorem euismod diam, in hendrerit orci risus ullamcorper orci. Etiam eleifend posuere consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut pellentesque diam a nisl accumsan, vitae vehicula leo porta. Nulla sapien lorem, congue non congue at, facilisis nec tortor. Sed ultrices orci sit amet ante varius ultrices. Nunc viverra mollis nunc id mollis. Proin accumsan lorem et eros molestie, ac maximus turpis eleifend.

Ut finibus dictum lacus. Suspendisse pretium, metus at consectetur eleifend, nibh erat aliquam risus, vitae posuere enim mi nec urna. Vestibulum fermentum molestie placerat. Proin est urna, aliquam quis fringilla sed, venenatis at urna. Phasellus porttitor lacus quis orci placerat venenatis. Aenean ut bibendum ipsum. Praesent commodo, est id feugiat aliquam, sapien ligula commodo est, vitae sodales lectus mi eu tortor. Vestibulum malesuada sit amet purus sit amet vestibulum. Suspendisse pharetra dui sed pulvinar ultrices. Maecenas lectus orci, molestie at ornare a, consequat sed mauris.

Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam molestie pharetra ligula sit amet facilisis. Nunc eros lacus, lacinia varius consequat nec, gravida vel magna. Morbi a mi ut justo mattis congue quis sed diam. Phasellus eget nisi non elit sollicitudin ultricies. Ut pharetra massa et velit consectetur, non cursus ligula dignissim. Suspendisse potenti. Aliquam lacinia dolor eget malesuada auctor.',
            'name'            => 'blog-post-1es',
            'uri'             => 'blog-post-1es',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 2,
            'langstable_id'   => 1,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'Very beautifull all Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla laborum eaque explicabo vel beatae, repellendus ea asperiores tempore quia, dolore? Dignissimos suscipit voluptatibus deserunt soluta voluptatem, veritatis minima nihil exercitationem repellat laboriosam ut necessitatibus, facere laudantium praesentium quaerat. Cupiditate voluptates fugiat rem voluptatem veritatis dolor dolores, illum aliquid? Obcaecati voluptas animi expedita quas, repudiandae quam. Repellendus mollitia rem nostrum minus officiis saepe, modi iste reiciendis vitae, dicta labore totam. Sequi nostrum maxime atque quos doloremque, dolor quis veniam, similique minima optio, accusamus exercitationem nisi eius itaque sunt, debitis porro aliquid quo magnam. Iusto nobis nihil, optio distinctio. Doloribus, fugiat, suscipit ea alias aperiam cupiditate molestiae officia libero, vel, illo saepe at obcaecati voluptatibus iure. Libero beatae porro eos sequi officia corporis, iusto rerum similique quod, vero at accusantium consectetur enim illo, quam facilis dolore. Voluptatibus asperiores tempore, non reprehenderit esse temporibus excepturi placeat consequuntur odio distinctio iste quos amet quis molestiae enim facilis eum. A ratione inventore reprehenderit error sequi. Quaerat repellat pariatur necessitatibus repudiandae, incidunt laborum explicabo laudantium ad dignissimos. Vitae minima quasi odit, ipsa accusantium deleniti nobis enim expedita quae tempore dolores consectetur culpa possimus impedit velit eius itaque, doloribus corrupti. Dicta neque commodi doloribus dolores porro harum blanditiis reprehenderit nesciunt alias cupiditate dolorum, quibusdam in expedita impedit, rerum voluptatem. Quibusdam, nemo sunt. Voluptate tempore modi fugiat architecto ducimus accusantium adipisci blanditiis molestias, consequuntur dolores beatae quisquam dicta autem ea laudantium possimus doloribus iste ratione impedit natus cum cupiditate, illo, nisi. Sapiente enim, debitis! Illum ut ab cumque, odit repudiandae esse iste, adipisci, reiciendis consequuntur nostrum hic. Ad libero vel unde facere nesciunt voluptatem, quis dignissimos temporibus laborum quam aperiam consequuntur ut at fugit animi, asperiores maiores soluta nulla distinctio explicabo, ratione suscipit? Magnam, veniam quo quidem ipsam aperiam id nihil nam maxime magni nesciunt numquam dolorum pariatur praesentium incidunt ipsum expedita sequi, sed obcaecati mollitia vero impedit corporis natus minus quas. Voluptatibus, minus, accusamus. Cum doloribus officia sapiente obcaecati aperiam neque ullam, reiciendis alias ratione aliquid voluptatem eligendi molestiae consectetur omnis ipsum aspernatur non nesciunt deserunt recusandae unde minus culpa soluta. Illum suscipit veniam dolorum nisi repellendus, tempore laudantium cumque accusamus harum voluptates autem fuga expedita odio mollitia in. Vitae vero cumque neque ipsum itaque autem, recusandae. Debitis aut, laborum commodi. Sapiente ex, sequi quidem a dolorum asperiores soluta laborum facere? Provident ducimus cum assumenda, voluptas, rem possimus labore consequatur dolorum eligendi, aspernatur quidem ea. Fugiat alias temporibus hic sequi corporis quod quia dignissimos quasi blanditiis sit adipisci doloremque quis provident, possimus, nulla ea veritatis et molestiae nam, cupiditate voluptatum eveniet. Laudantium magni, odit natus excepturi, ipsum ex, rem tenetur dolor fugit saepe impedit cupiditate ab error. Quo harum eaque architecto, impedit nostrum error laboriosam, obcaecati enim voluptatum consectetur officia, quasi odit neque consequatur in ratione tempore possimus accusantium veritatis beatae quae repellendus! Reiciendis accusamus, vero quasi omnis nam eveniet non molestias? Corrupti doloribus quaerat asperiores eos. Autem, totam ipsa quae tempora quia voluptatem, quibusdam vel odio rerum corrupti cumque, sunt adipisci perferendis, perspiciatis a facilis ullam!',
            'name'            => 'blog-post-1en',
            'uri'             => 'blog-post-1en',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 3,
            'langstable_id'   => 1,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'très bien tout Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur illum corporis culpa soluta, consequatur in, officia! Dolor suscipit similique perferendis asperiores tenetur nostrum, quam libero. Laborum minima quae iste itaque quia deleniti praesentium architecto consequatur, quas neque, necessitatibus error at corporis, ullam sequi eaque adipisci aliquid asperiores ut odit ratione! Impedit nam, blanditiis nemo iure vitae modi. Totam architecto ex sapiente dignissimos tenetur ipsam necessitatibus. Fugit non ab aspernatur laborum enim, magnam eveniet est dolore eius amet maxime eum illo magni perferendis deleniti dolores corporis qui voluptates nihil similique. Distinctio soluta, aspernatur hic eligendi dignissimos corporis quia laudantium inventore, nemo est ex voluptate minima perspiciatis voluptatum fugit fugiat aliquid necessitatibus accusantium enim. Perferendis nihil non dignissimos dolor commodi blanditiis laboriosam, ex eaque sed accusantium est soluta molestias eligendi fuga inventore iure tenetur explicabo! Dolor, modi totam! Cupiditate vel at soluta harum voluptatem eaque itaque enim impedit quia laborum, fuga facere repudiandae. Rem, commodi blanditiis dolor est nesciunt harum. Laboriosam tempora blanditiis cupiditate nesciunt quod incidunt aperiam molestiae suscipit sequi, facilis, totam aliquid maxime quo nobis provident possimus? Impedit doloribus magni deserunt sit unde expedita, laborum sapiente maiores blanditiis eius explicabo necessitatibus, consequatur ipsam quidem voluptatibus cupiditate quae autem corrupti repellat recusandae quod culpa tempore delectus veniam quibusdam. Soluta error debitis itaque, similique repellat optio consequatur minus, expedita impedit labore tenetur dolorum ratione quaerat. Sunt doloremque quidem laborum nulla asperiores magni quo eum beatae excepturi deserunt tempore quam placeat maxime, temporibus expedita voluptatum error distinctio nihil fugit cum dolores rerum corporis maiores quasi? Officia dolores quia itaque, ea, tempore accusamus reprehenderit libero qui dolore quo, cupiditate facere! Facilis, sequi? Temporibus vero aliquam optio alias esse animi perferendis deleniti facere quibusdam at velit voluptate, iure quae ad minus, voluptas numquam sint eveniet. In eum voluptatibus error quasi nobis eaque labore necessitatibus quibusdam, temporibus veritatis natus, placeat dignissimos. Repudiandae, cupiditate. Placeat reprehenderit, neque eligendi facere et facilis similique illum magnam numquam. Laborum quisquam voluptas qui eveniet expedita, velit, nihil dolore quas voluptate ea cupiditate possimus tempore perferendis incidunt omnis eum ipsam iure nisi vel voluptatibus eius doloremque. Error soluta omnis nam amet! Similique maiores repudiandae consequatur. Similique voluptates sit cupiditate porro neque sequi aspernatur atque molestiae repudiandae quia? Temporibus incidunt corrupti dolorum voluptate culpa, quos eos labore deleniti atque. Rerum dolores id, suscipit, veritatis, accusamus nemo modi omnis maiores nulla nostrum possimus illo mollitia doloribus optio error pariatur in atque consequuntur magni! Provident facere commodi autem, debitis repellendus est ipsum incidunt repellat doloribus illum! Quam id quia, fugit aperiam mollitia distinctio porro, voluptas illo recusandae modi qui dignissimos explicabo sapiente eligendi labore doloribus voluptatibus, esse. Consequuntur rem at deserunt, omnis maxime neque modi. Magnam obcaecati cumque modi. Provident blanditiis iusto repellat saepe, quae voluptate ipsa corrupti veritatis omnis cupiditate suscipit quidem explicabo porro obcaecati, praesentium expedita veniam eius molestiae quo consequuntur labore accusamus ratione, sed quos. A, quae. Optio deserunt magni hic debitis in est sequi porro. Quam atque nulla fugiat placeat ratione aliquam. Deserunt temporibus ullam excepturi similique aperiam eligendi iste officiis!',
            'name'            => 'blog-post-1fr',
            'uri'             => 'blog-post-1fr',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 1,
            'langstable_id'   => 2,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id lacinia sem. Nam id varius turpis, et blandit ante. Aliquam condimentum vulputate elit non venenatis. Cras sagittis ipsum ut eros convallis posuere. Aenean non sem egestas ante semper vehicula. Nunc diam nunc, consectetur non odio eu, tincidunt ultrices erat. Maecenas sapien libero, consequat vel dignissim eget, viverra sed nunc. Vivamus id purus luctus, tincidunt orci ac, auctor ex. Nullam velit risus, aliquam eu placerat vel, finibus eget orci. Phasellus volutpat, velit vel imperdiet varius, erat magna condimentum quam, et tempus odio arcu nec augue. Nulla et vulputate felis. Maecenas eu congue nunc, eget tincidunt eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur tincidunt vestibulum diam in feugiat.

Donec pellentesque turpis lacus, accumsan egestas libero tristique sit amet. Duis sem diam, pretium at ipsum a, hendrerit auctor nulla. Pellentesque tincidunt pulvinar libero nec vehicula. Fusce tempus eros ac sapien ornare pharetra. Morbi interdum leo ut enim posuere feugiat. Quisque condimentum auctor odio, et molestie arcu vestibulum accumsan. Vivamus eu vulputate risus. Suspendisse finibus mattis tempus. Curabitur scelerisque diam lorem, ut sollicitudin lectus vehicula ut. Nullam viverra neque a dolor tempus faucibus. Suspendisse eget volutpat elit.

In accumsan, sem id pharetra feugiat, lorem lorem euismod diam, in hendrerit orci risus ullamcorper orci. Etiam eleifend posuere consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut pellentesque diam a nisl accumsan, vitae vehicula leo porta. Nulla sapien lorem, congue non congue at, facilisis nec tortor. Sed ultrices orci sit amet ante varius ultrices. Nunc viverra mollis nunc id mollis. Proin accumsan lorem et eros molestie, ac maximus turpis eleifend.

Ut finibus dictum lacus. Suspendisse pretium, metus at consectetur eleifend, nibh erat aliquam risus, vitae posuere enim mi nec urna. Vestibulum fermentum molestie placerat. Proin est urna, aliquam quis fringilla sed, venenatis at urna. Phasellus porttitor lacus quis orci placerat venenatis. Aenean ut bibendum ipsum. Praesent commodo, est id feugiat aliquam, sapien ligula commodo est, vitae sodales lectus mi eu tortor. Vestibulum malesuada sit amet purus sit amet vestibulum. Suspendisse pharetra dui sed pulvinar ultrices. Maecenas lectus orci, molestie at ornare a, consequat sed mauris.

Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam molestie pharetra ligula sit amet facilisis. Nunc eros lacus, lacinia varius consequat nec, gravida vel magna. Morbi a mi ut justo mattis congue quis sed diam. Phasellus eget nisi non elit sollicitudin ultricies. Ut pharetra massa et velit consectetur, non cursus ligula dignissim. Suspendisse potenti. Aliquam lacinia dolor eget malesuada auctor.',
            'name'            => 'blog-post-2es',
            'uri'             => 'blog-post-2es',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 2,
            'langstable_id'   => 2,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'Very beautifull all Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id maiores ullam temporibus aspernatur eligendi quas excepturi quidem voluptatibus architecto magnam illo blanditiis error doloribus, assumenda ratione velit ea. Fuga laudantium accusantium quisquam alias, dolorem amet quis ipsa voluptatibus id nesciunt itaque saepe facilis doloribus omnis praesentium quos eaque vitae, incidunt nisi ad accusamus consequuntur. Illum obcaecati voluptatum dolorum error distinctio est natus numquam fugit iusto perspiciatis facere officia omnis similique velit, eveniet neque inventore tenetur, nam nobis deleniti maxime delectus. Impedit eaque magni harum, suscipit ab, unde praesentium dolore quas illum quos nobis, rem quod ipsam ex neque culpa voluptate fuga repellat mollitia. Ad quos eos quibusdam natus necessitatibus minima, quae ratione vero odit, inventore adipisci quam voluptates dolorum. Molestias fugit adipisci, optio eos distinctio quasi enim minus vitae, maiores, reprehenderit iste. Iusto esse facere debitis recusandae temporibus provident perspiciatis tempore illum sit laborum, ratione dolor quos quibusdam maiores voluptates consequuntur quod in excepturi aspernatur ea sint. Quidem consequatur temporibus optio amet ipsum sequi neque eum praesentium voluptates dolor, nemo, illo a dolores itaque magnam, possimus necessitatibus at illum. Saepe quo accusamus dicta temporibus sit excepturi illo tenetur, esse deserunt eum dolorum eius aspernatur obcaecati? Esse ipsam tempore dolore, at hic laboriosam dignissimos aspernatur! Assumenda quidem impedit cupiditate enim provident itaque obcaecati at nobis. Autem nisi at, reprehenderit doloremque, harum, inventore sequi repellendus nostrum excepturi officia pariatur! Nulla vitae ducimus neque praesentium nemo tempore molestias numquam architecto velit. Facere molestias nesciunt velit, est repudiandae deleniti, eaque autem possimus perspiciatis voluptatibus id sunt amet a nisi ducimus laborum voluptates dolores magni? Expedita voluptates possimus vero cupiditate ducimus molestiae delectus animi ut at eius quis ea quam voluptatibus voluptas optio qui architecto, neque id fugiat obcaecati nulla tenetur rem unde iusto assumenda. Explicabo, qui! Quas debitis excepturi esse voluptatem ab distinctio quo, quia dignissimos repellendus, veritatis reprehenderit facere ipsum beatae ea natus odit commodi ex sint dolorum consequatur repudiandae ut neque eligendi. Excepturi repudiandae sunt, porro quidem ab animi eos dolorem voluptatibus accusantium consequuntur harum aspernatur commodi ea labore sit non corrupti numquam qui alias repellat totam. Autem, eos. Aperiam impedit magnam, ipsa, corporis iste error fuga quae saepe nostrum molestiae necessitatibus exercitationem iusto nemo cumque quis dolore dicta quibusdam. Quas ea aspernatur saepe fugit vero doloremque iusto! Atque a voluptatum assumenda voluptate est beatae fugit, cumque voluptas mollitia deleniti esse, odio. Ex asperiores atque praesentium ad quam corporis voluptates eius, maxime inventore perspiciatis minima delectus veniam? Illum possimus labore explicabo perspiciatis sunt cum quaerat, amet consectetur repudiandae, incidunt voluptas accusamus, facilis nemo beatae. Asperiores velit sequi unde obcaecati possimus minus repellat eveniet quo, aliquid illo mollitia fugiat quod, minima ea, quibusdam omnis iste laudantium, cumque culpa quaerat. Voluptas voluptates quo sit sint incidunt, eligendi, necessitatibus aspernatur similique dolore, suscipit temporibus ipsa dolorum! Recusandae officia nostrum, odio, in quibusdam voluptatem ullam eveniet sunt rerum aspernatur consequatur! Voluptate velit, itaque! Accusantium animi, laudantium nobis eligendi id! At fuga in, atque, voluptatem corrupti quia ipsam voluptas accusamus deleniti asperiores omnis aspernatur ducimus eaque excepturi.',
            'name'            => 'blog-post-2en',
            'uri'             => 'blog-post-2en',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 3,
            'langstable_id'   => 2,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'très bien tout Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum illum officia enim, sunt eos dolorum soluta hic explicabo ut beatae perspiciatis temporibus impedit eveniet veniam quibusdam magni ipsa, minus reprehenderit suscipit nemo eum ipsum possimus. Delectus distinctio adipisci itaque sapiente, nemo sequi quod facere quaerat voluptates officia voluptatem consequatur repudiandae sed maiores. Nam esse minima excepturi, exercitationem suscipit, eum unde praesentium facere totam nulla mollitia officia sint obcaecati id doloribus. Voluptatibus iste obcaecati molestias velit ad nulla pariatur vitae, aliquid sint, voluptates quasi non repellendus veniam sit ipsum, sequi error! Corporis qui autem, minus ex repellendus officia deserunt quisquam, laudantium itaque cupiditate ducimus! Iure cumque doloremque quam animi nesciunt ipsum ab asperiores incidunt fugit, explicabo deleniti error dolore odit enim consequatur, voluptate, quo suscipit fuga harum nihil cum temporibus sunt vitae itaque. Eum harum corporis adipisci aspernatur asperiores, ab magnam placeat saepe, laborum modi suscipit blanditiis excepturi autem! Perspiciatis temporibus quisquam perferendis, voluptas ab error quas labore mollitia repudiandae dignissimos, quaerat quod aliquid! Illo voluptas, est molestias tempore aliquam rem non tempora autem. Amet quia doloremque illum est nihil laudantium culpa impedit tenetur saepe qui quae dolorum iusto, a perferendis quis ullam similique odio earum nisi unde reiciendis facilis, repellat velit cum expedita! Autem itaque earum explicabo officia similique harum sunt fuga totam eveniet eligendi reiciendis ad, aliquid sed architecto a necessitatibus saepe dolores hic nulla libero. Eaque eligendi quam aliquam at placeat natus hic, laborum obcaecati saepe in harum nisi id. Accusamus quis velit nisi reprehenderit recusandae, ullam, error facilis maxime amet impedit distinctio earum, nobis perspiciatis cumque cum ea harum porro similique placeat neque unde. Saepe laudantium, natus voluptatum explicabo, minus voluptatibus quam voluptates repellat magni! Aut maxime tempore quam commodi illo natus praesentium quisquam excepturi omnis, eveniet explicabo obcaecati, in dolores cupiditate. Eaque atque, rerum a beatae et esse vel voluptate laboriosam alias impedit illo totam, facere neque fugiat, soluta cupiditate doloremque debitis! Beatae reiciendis illum excepturi quam dolorem voluptatibus, cupiditate non nisi voluptate, similique quisquam. Cupiditate earum quaerat debitis eum veritatis quidem iure beatae in libero sequi magni et corrupti incidunt ipsum laudantium eligendi, non sed laboriosam quod est accusantium. Qui in similique temporibus labore quos laboriosam soluta animi dolores nihil omnis asperiores quae neque minus, maxime fugit totam veniam deleniti reprehenderit inventore enim optio commodi hic numquam? Debitis dolore iure aut, accusantium sunt sapiente, incidunt provident sint enim, dolorem sit quasi asperiores pariatur consectetur culpa sequi qui, autem esse soluta. Asperiores sequi voluptate tempora quia perspiciatis corrupti minus a, modi voluptas, quae fugiat reiciendis commodi, cumque, blanditiis! Ducimus at officiis sint corrupti, numquam facilis ipsum. Perferendis dolores iusto, et voluptatibus mollitia consectetur quaerat ad cumque nesciunt, alias doloribus excepturi, quas molestias voluptate! Animi labore consequatur molestiae officiis quisquam, assumenda a repellendus sed incidunt odit soluta, magni libero rem voluptatem. Adipisci cum, repellat suscipit vitae culpa consequatur saepe commodi a ipsa obcaecati in ex perspiciatis voluptatem libero placeat nulla laboriosam similique veniam illo iste! Qui provident ut dolorum adipisci totam tenetur, dolore laboriosam maxime nostrum error?',
            'name'            => 'blog-post-2fr',
            'uri'             => 'blog-post-2fr',

        ));

        // Lenguajes dos post en la categoria 2

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 1,
            'langstable_id'   => 3,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id lacinia sem. Nam id varius turpis, et blandit ante. Aliquam condimentum vulputate elit non venenatis. Cras sagittis ipsum ut eros convallis posuere. Aenean non sem egestas ante semper vehicula. Nunc diam nunc, consectetur non odio eu, tincidunt ultrices erat. Maecenas sapien libero, consequat vel dignissim eget, viverra sed nunc. Vivamus id purus luctus, tincidunt orci ac, auctor ex. Nullam velit risus, aliquam eu placerat vel, finibus eget orci. Phasellus volutpat, velit vel imperdiet varius, erat magna condimentum quam, et tempus odio arcu nec augue. Nulla et vulputate felis. Maecenas eu congue nunc, eget tincidunt eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur tincidunt vestibulum diam in feugiat.

Donec pellentesque turpis lacus, accumsan egestas libero tristique sit amet. Duis sem diam, pretium at ipsum a, hendrerit auctor nulla. Pellentesque tincidunt pulvinar libero nec vehicula. Fusce tempus eros ac sapien ornare pharetra. Morbi interdum leo ut enim posuere feugiat. Quisque condimentum auctor odio, et molestie arcu vestibulum accumsan. Vivamus eu vulputate risus. Suspendisse finibus mattis tempus. Curabitur scelerisque diam lorem, ut sollicitudin lectus vehicula ut. Nullam viverra neque a dolor tempus faucibus. Suspendisse eget volutpat elit.

In accumsan, sem id pharetra feugiat, lorem lorem euismod diam, in hendrerit orci risus ullamcorper orci. Etiam eleifend posuere consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut pellentesque diam a nisl accumsan, vitae vehicula leo porta. Nulla sapien lorem, congue non congue at, facilisis nec tortor. Sed ultrices orci sit amet ante varius ultrices. Nunc viverra mollis nunc id mollis. Proin accumsan lorem et eros molestie, ac maximus turpis eleifend.

Ut finibus dictum lacus. Suspendisse pretium, metus at consectetur eleifend, nibh erat aliquam risus, vitae posuere enim mi nec urna. Vestibulum fermentum molestie placerat. Proin est urna, aliquam quis fringilla sed, venenatis at urna. Phasellus porttitor lacus quis orci placerat venenatis. Aenean ut bibendum ipsum. Praesent commodo, est id feugiat aliquam, sapien ligula commodo est, vitae sodales lectus mi eu tortor. Vestibulum malesuada sit amet purus sit amet vestibulum. Suspendisse pharetra dui sed pulvinar ultrices. Maecenas lectus orci, molestie at ornare a, consequat sed mauris.

Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam molestie pharetra ligula sit amet facilisis. Nunc eros lacus, lacinia varius consequat nec, gravida vel magna. Morbi a mi ut justo mattis congue quis sed diam. Phasellus eget nisi non elit sollicitudin ultricies. Ut pharetra massa et velit consectetur, non cursus ligula dignissim. Suspendisse potenti. Aliquam lacinia dolor eget malesuada auctor.',
            'name'            => 'blog-post-3es',
            'uri'             => 'blog-post-3es',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 2,
            'langstable_id'   => 3,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'Very beautifull all Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi mollitia sunt pariatur a voluptatibus fuga, neque ipsum aliquid beatae modi, tenetur, reiciendis sapiente quibusdam culpa debitis eaque nesciunt voluptate eos inventore odit nemo. Sapiente magnam voluptatem repellendus perferendis dolores facere tempora velit, eum laudantium ea, sit reiciendis eaque praesentium porro. Quia sequi, porro corporis! Totam sunt, nostrum veniam, quo ea vel voluptate, ullam distinctio hic ipsa minus provident. Autem, ipsa. Dolorem sapiente aut facilis modi quaerat aperiam accusamus, odio labore nostrum, magni voluptatibus atque consectetur odit commodi nisi quis. Iure ad dolorem tenetur, voluptatem dicta ea. Molestiae error velit sint cum voluptatem quam veritatis explicabo provident aliquam pariatur eaque tempore, sit blanditiis beatae doloremque magni dicta porro numquam quas corporis accusantium, officia praesentium inventore. Qui officia modi veniam explicabo eum accusantium consequuntur magnam minima quas, nisi hic ipsum, neque excepturi facilis sit ab voluptatibus maiores ex eius porro quibusdam, earum fugit nam temporibus. Nemo voluptatem nisi, magni modi vel harum veniam dolor dolorum eveniet consequatur. Illum deleniti tempora fugit assumenda hic quam explicabo corrupti repellat minima accusantium quod molestiae, totam non, maxime id labore doloribus suscipit provident odio perspiciatis quas. Quod itaque, earum, repudiandae dolorum provident tempore ducimus! Deserunt quae voluptatibus, non vel hic iure eos enim excepturi asperiores consectetur similique atque ad, est nostrum saepe adipisci quam ipsam ducimus rerum. Dolore eos facere porro, suscipit velit enim, quis, totam ullam voluptatem vitae sit voluptatibus quia nihil. Facilis, dolores reiciendis quasi similique? Perspiciatis veniam, fuga incidunt harum maxime similique, accusantium sed quibusdam eligendi quasi natus laboriosam perferendis error repellat quae repudiandae voluptatum vitae ipsum praesentium dolor fugit facere. Voluptatem saepe provident molestias nobis tenetur debitis sequi, porro doloremque aut consectetur incidunt similique. Ad repellat excepturi, cum dolorum repudiandae recusandae magni praesentium, eius alias tempore totam modi accusantium doloremque? Eaque tempora omnis eos ipsum saepe, dolores sapiente animi illo natus laudantium alias, laboriosam vel magnam quasi maxime consequuntur non velit ab mollitia quod, facere ullam perferendis molestias! Expedita quos velit enim quidem illum perferendis ad aperiam exercitationem quo error obcaecati, magni laborum nostrum debitis corrupti sequi porro et. Sit doloribus facilis facere adipisci fuga, nemo officiis itaque atque quis esse eligendi. Sed accusantium eos voluptatibus, expedita soluta quibusdam, in repellat, est odit reiciendis enim placeat qui totam eum minima. Sit repellendus, maxime totam nihil veniam quo at nisi facilis possimus unde quaerat enim tempore velit voluptate modi porro vel natus quod laborum sapiente, optio ad reiciendis aliquid! Quasi accusantium sequi rem nulla, pariatur porro similique facere libero blanditiis cupiditate unde saepe facilis, laborum optio aperiam! Veniam similique alias, excepturi ex aliquid asperiores, laboriosam provident officiis, maiores iure quis voluptatem magnam dolorem fugiat libero culpa? Nisi libero, assumenda beatae! Saepe laboriosam vitae, minima iste, ullam quas illum soluta quos dicta dolor repellendus aliquam officia placeat error inventore, deleniti quaerat corporis praesentium eum incidunt delectus. Qui officia, id pariatur, maiores tenetur amet! Eaque suscipit, ea quis neque itaque laborum delectus labore, illo molestiae amet, consectetur alias asperiores harum soluta eius expedita, dicta rem.',
            'name'            => 'blog-post-3en',
            'uri'             => 'blog-post-3en',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 3,
            'langstable_id'   => 3,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'très bien tout Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore voluptatem totam quidem facilis iusto harum soluta culpa, consectetur esse molestiae odio sequi temporibus praesentium dicta, perferendis ipsa nostrum. Dolorum ipsam iste reprehenderit, obcaecati qui beatae, temporibus alias. Sint, molestiae dolorem veritatis iusto dolores, delectus tempora iure repudiandae alias veniam impedit! Cumque accusantium quasi doloremque. Ratione cumque officiis error neque quaerat odio quidem vero eum, eos ullam aut reprehenderit cum minima nihil aspernatur. Sed nemo delectus adipisci nihil. Dolor, culpa. At, cum, laudantium! Odio, nulla eaque laborum dicta dolor aperiam quis ea, deleniti, ut et assumenda. Iste unde consequuntur aliquam dicta. Voluptatibus dolorem, nobis. Sint neque voluptatem, ullam eligendi architecto facere vero quod, soluta quia tenetur blanditiis ea quaerat ipsa officia, laboriosam sunt perspiciatis? Placeat voluptatibus voluptatum, cumque quibusdam quasi aliquam quos commodi ipsam inventore autem perferendis sapiente exercitationem quia quidem voluptas repellendus fugit expedita asperiores nemo rem. Debitis voluptatem ut amet deserunt sint odio repudiandae non beatae adipisci illo accusamus, fugiat, reprehenderit totam vitae aliquam sed fuga autem praesentium ratione laboriosam. Voluptatibus error, amet sint quibusdam est illum nulla, harum sunt unde consectetur eius quam quaerat id doloribus fugiat eos, quasi mollitia ducimus nostrum excepturi ut repellendus dolores. Ex quod fuga id quisquam ipsa cum recusandae consequatur. Voluptas quod, obcaecati sequi nihil dignissimos quaerat repudiandae repellat veritatis soluta nesciunt voluptates odit. Repellendus error adipisci, pariatur atque illum! Vel fugit ex ipsum mollitia deleniti molestias autem, tempora quia quas voluptates deserunt minus, odio aut culpa perspiciatis facilis doloremque vero nam natus cum ipsam sequi ad. Nemo corporis magnam ex esse, tempora cumque consequatur ipsam placeat pariatur doloribus ullam magni voluptatem, maxime ipsa fugiat. Illum iusto aliquid adipisci unde explicabo, voluptatum facere quos nobis qui obcaecati aliquam inventore aperiam aspernatur non officia, harum ratione natus maxime debitis quibusdam. Repudiandae dolore itaque dolorum fugiat nesciunt cupiditate qui doloremque, provident aut cumque sequi consequatur laboriosam laudantium ex dignissimos est ipsa eius voluptatem et magni, adipisci aperiam eligendi molestiae iusto. Eum ad sit itaque, beatae, cumque animi aperiam pariatur commodi aut ipsam voluptatibus, expedita quia quibusdam mollitia. Recusandae consequuntur, illo, saepe, commodi enim voluptatibus tempore aperiam totam quasi eos obcaecati. Explicabo voluptas rerum voluptate maiores alias id pariatur, ratione hic vitae laborum harum temporibus eveniet quia quidem, similique adipisci omnis sunt eos. A facilis, ullam dolorem numquam. Eius autem minima at, voluptas placeat molestiae sit ipsam dolore reprehenderit dicta! Ipsa atque, autem molestias. Omnis deleniti consequatur harum quia recusandae sint exercitationem ducimus corrupti rerum eveniet, facere iusto iure dolores repudiandae id est dolor sit blanditiis adipisci accusantium minus assumenda, unde doloribus. Facilis quia eaque quos suscipit, eum necessitatibus atque non et accusamus laudantium odio fugiat neque magnam architecto placeat maiores, ea quas nostrum labore maxime deleniti possimus quod at? Dolores deleniti vero nulla vel hic culpa ea, voluptatum, quidem ipsum possimus itaque odit temporibus tenetur quos mollitia error! Nisi cupiditate ipsa laboriosam. Similique aut inventore, ratione voluptatum ad quibusdam eaque hic ex aliquam totam, harum quos consequatur, commodi expedita vel. Odio quos nulla voluptates fugiat?',
            'name'            => 'blog-post-3fr',
            'uri'             => 'blog-post-3fr',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 1,
            'langstable_id'   => 4,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id lacinia sem. Nam id varius turpis, et blandit ante. Aliquam condimentum vulputate elit non venenatis. Cras sagittis ipsum ut eros convallis posuere. Aenean non sem egestas ante semper vehicula. Nunc diam nunc, consectetur non odio eu, tincidunt ultrices erat. Maecenas sapien libero, consequat vel dignissim eget, viverra sed nunc. Vivamus id purus luctus, tincidunt orci ac, auctor ex. Nullam velit risus, aliquam eu placerat vel, finibus eget orci. Phasellus volutpat, velit vel imperdiet varius, erat magna condimentum quam, et tempus odio arcu nec augue. Nulla et vulputate felis. Maecenas eu congue nunc, eget tincidunt eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur tincidunt vestibulum diam in feugiat.

Donec pellentesque turpis lacus, accumsan egestas libero tristique sit amet. Duis sem diam, pretium at ipsum a, hendrerit auctor nulla. Pellentesque tincidunt pulvinar libero nec vehicula. Fusce tempus eros ac sapien ornare pharetra. Morbi interdum leo ut enim posuere feugiat. Quisque condimentum auctor odio, et molestie arcu vestibulum accumsan. Vivamus eu vulputate risus. Suspendisse finibus mattis tempus. Curabitur scelerisque diam lorem, ut sollicitudin lectus vehicula ut. Nullam viverra neque a dolor tempus faucibus. Suspendisse eget volutpat elit.

In accumsan, sem id pharetra feugiat, lorem lorem euismod diam, in hendrerit orci risus ullamcorper orci. Etiam eleifend posuere consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut pellentesque diam a nisl accumsan, vitae vehicula leo porta. Nulla sapien lorem, congue non congue at, facilisis nec tortor. Sed ultrices orci sit amet ante varius ultrices. Nunc viverra mollis nunc id mollis. Proin accumsan lorem et eros molestie, ac maximus turpis eleifend.

Ut finibus dictum lacus. Suspendisse pretium, metus at consectetur eleifend, nibh erat aliquam risus, vitae posuere enim mi nec urna. Vestibulum fermentum molestie placerat. Proin est urna, aliquam quis fringilla sed, venenatis at urna. Phasellus porttitor lacus quis orci placerat venenatis. Aenean ut bibendum ipsum. Praesent commodo, est id feugiat aliquam, sapien ligula commodo est, vitae sodales lectus mi eu tortor. Vestibulum malesuada sit amet purus sit amet vestibulum. Suspendisse pharetra dui sed pulvinar ultrices. Maecenas lectus orci, molestie at ornare a, consequat sed mauris.

Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam molestie pharetra ligula sit amet facilisis. Nunc eros lacus, lacinia varius consequat nec, gravida vel magna. Morbi a mi ut justo mattis congue quis sed diam. Phasellus eget nisi non elit sollicitudin ultricies. Ut pharetra massa et velit consectetur, non cursus ligula dignissim. Suspendisse potenti. Aliquam lacinia dolor eget malesuada auctor.',
            'name'            => 'blog-post-4es',
            'uri'             => 'blog-post-4es',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 2,
            'langstable_id'   => 4,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'Very beautifull all Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero quo facilis itaque voluptate repellat sapiente tempore. Amet sunt quis libero, voluptas maiores eum magnam neque harum molestias perferendis? Facilis ipsa assumenda, ab quam nesciunt. Debitis qui in, iste ab quam minus earum numquam optio tenetur libero unde, hic ex tempora eos necessitatibus, quae adipisci! Numquam voluptates pariatur facere explicabo aspernatur earum adipisci repellendus molestiae consequatur. Repellat unde consequuntur, voluptatum sit distinctio earum nam. Itaque harum tenetur architecto natus ex commodi maiores debitis? Temporibus fuga, alias maxime dolorum, illum nemo. Sint quam nesciunt nemo vero quidem doloribus dolorem soluta sit id harum blanditiis facere doloremque enim alias quas, beatae voluptas a. Ratione tenetur nam, eius eveniet totam delectus repellendus omnis laudantium, repellat asperiores necessitatibus velit porro accusamus ab assumenda cum sit architecto odit placeat soluta pariatur minima, aliquam quibusdam. Impedit ex voluptatum optio, quas similique, alias saepe, at qui ea debitis eum deleniti veniam rerum repellat commodi deserunt voluptas. Aut qui molestiae vitae suscipit quidem quaerat placeat facere doloremque, modi expedita similique magni recusandae praesentium repellat, tenetur architecto, saepe dolore explicabo, deserunt minus! Consequuntur cupiditate dolores omnis recusandae magni vel rerum, voluptates eligendi dolorem quas excepturi ad porro doloremque placeat alias inventore itaque doloribus eum. Quas voluptatum ipsam provident repudiandae id pariatur magnam fugiat sequi explicabo, tempore minus, ut saepe! Adipisci possimus sequi, aliquid inventore repellendus et quod a nisi vel dicta iure voluptate reprehenderit, praesentium cumque dignissimos voluptas molestiae neque harum dolorem laudantium ipsa! Rem commodi necessitatibus porro numquam, sapiente, aliquid odit libero sit in sunt officiis quasi ipsa aperiam velit. Consectetur modi, aperiam dolorum fuga repellat corporis labore unde dignissimos eum, iure culpa odit assumenda. Quod assumenda beatae non at asperiores voluptatibus officia veniam temporibus aliquid quibusdam animi, maxime illum dicta ullam praesentium enim nisi unde aspernatur! Quis qui, quasi consectetur, rem ipsam soluta dolorum fugit voluptatum, aspernatur placeat ad voluptas sit pariatur. Sed vel, atque reprehenderit quos expedita aut ipsa voluptas fugit perspiciatis veritatis quasi omnis dolor similique quo magni ea alias id laboriosam natus. Adipisci vero ducimus, blanditiis quod laudantium dicta eius debitis nulla hic commodi totam magni non, eum ullam fugiat, sit laboriosam consectetur optio sunt exercitationem sequi, a facilis soluta! Dolor explicabo cumque perspiciatis at in quam, laborum, mollitia vel quaerat voluptatem. Tempora quos, alias modi dolore veniam omnis ipsum facere eum? Tempore assumenda quasi blanditiis aperiam esse vero laboriosam, deserunt alias fugiat. Optio delectus perferendis cumque nihil repellendus magni illo hic, magnam provident maxime quae aspernatur aperiam, mollitia alias. Corrupti tempore atque sequi id, possimus labore illo facilis fuga in pariatur, impedit quisquam quaerat aut molestiae voluptatibus exercitationem dolorem, mollitia quibusdam quos maxime autem commodi eos. Incidunt ducimus dolorem qui voluptatem sequi distinctio magni, autem ut consequuntur aperiam animi, necessitatibus accusamus. Explicabo quisquam, amet eveniet voluptatum eum nostrum. Minima aut, unde, sequi laboriosam ut suscipit totam qui. Fugit sit consequuntur quia enim hic nemo maxime sed at sunt minus consequatur deleniti, alias ipsum vitae tempora accusamus aliquam perferendis natus a magni. Doloribus ullam, tempore.',
            'name'            => 'blog-post-4en',
            'uri'             => 'blog-post-4en',

        ));

        DB::table('lang_fields')->insert(array(
            'id_lang'         => 3,
            'langstable_id'   => 4,
            'langstable_type' => 'blog\blogsystem\Models\Post',
            'description'     => 'très bien tout Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta veniam adipisci hic, totam nihil quidem vel exercitationem odit natus tempore animi similique consequatur minima esse laboriosam praesentium cum porro necessitatibus, in quod dolore sapiente quas sunt. Eos eius porro officiis dignissimos ratione consequatur dolorem perferendis. Praesentium error cupiditate, itaque enim inventore magni? Iusto perferendis architecto sit et at, rerum voluptatum voluptates id debitis laudantium aliquid atque molestiae labore iure earum rem, odit totam quam pariatur, sapiente magni aliquam minus! Sit animi, nesciunt laudantium deserunt id quae velit, quisquam neque natus maxime nemo. Repellat animi nesciunt voluptates voluptatibus laborum perspiciatis, cum sunt tenetur? Aperiam reprehenderit, eos, atque natus culpa dolorum nostrum minus repellendus ipsam ex blanditiis ad, mollitia fuga ducimus! Temporibus omnis animi quae molestiae molestias dolorem, autem nihil dolorum tenetur! Error recusandae perferendis, adipisci reprehenderit. Repellat voluptatum explicabo aperiam quidem enim, accusantium totam possimus tenetur quas aliquid modi fugiat ex odio voluptate, laborum alias sequi repudiandae consequatur rem doloribus aliquam veritatis suscipit nam ipsa. Sint id cum quae laboriosam pariatur suscipit nesciunt autem dolore ipsam fugiat corporis odio sit, deserunt dicta dolor tenetur minus, error quidem in numquam aliquid, sapiente. Rem eligendi laborum provident, voluptas necessitatibus. Alias delectus aperiam distinctio dolores vitae libero magni dignissimos asperiores tempore quo quasi mollitia, labore eligendi et doloremque atque commodi accusantium. Fuga expedita numquam veritatis omnis quas eveniet nisi quidem tempora, distinctio sapiente, et facilis. Alias impedit debitis accusantium aliquam temporibus officiis inventore repudiandae est nisi doloribus fuga consequatur exercitationem ipsam illo, recusandae. Quaerat officia dolorum aperiam, maiores aliquam aut eius cum eaque pariatur neque ad, porro tenetur quos, a corporis distinctio quia doloribus quasi labore? Laborum iste distinctio, excepturi obcaecati tempora. Aut porro distinctio consectetur quisquam maxime illum eligendi illo dignissimos recusandae nulla dolorem eaque repellendus nobis eos voluptates, corporis odio quam non, fuga, minima voluptatum, tempora! Laudantium a distinctio nobis, sapiente illo dolores, odio iste commodi dolor inventore fugit beatae accusamus officia sunt at. Reprehenderit fuga, magnam doloribus iste quaerat praesentium eaque aliquam debitis accusantium accusamus, facilis eius nam nobis inventore natus. Dolore voluptatem consequatur magni alias asperiores eos quibusdam adipisci omnis mollitia repudiandae incidunt, possimus inventore sed odio maxime qui nulla harum, at quaerat pariatur. Illum corrupti optio id eligendi rerum reiciendis nobis ducimus ex perferendis earum, quasi, minus exercitationem distinctio amet magni asperiores, modi ad nemo veniam nam sint quia quas provident at eius? Perspiciatis recusandae dolore ullam cupiditate nihil ratione quos consectetur modi, dolores ipsa voluptatem amet sunt est sit fugit ducimus? Nihil eos quos odit dolores maiores qui unde veritatis architecto illum molestias libero saepe nam harum optio ipsum laudantium, praesentium, vel asperiores amet voluptatum blanditiis perferendis aspernatur! Ex in quos aliquid impedit eligendi quidem alias vel, quibusdam assumenda fuga, iste dicta commodi voluptas iure a sed eos obcaecati error consequuntur exercitationem dolorum magni. Autem inventore saepe est nam earum ab sequi et fugiat, assumenda modi voluptate animi cupiditate in soluta hic, ipsam libero explicabo quaerat neque, mollitia vitae placeat reiciendis. Eius laborum repellendus optio, adipisci dolore obcaecati.',
            'name'            => 'blog-post-4fr',
            'uri'             => 'blog-post-4fr',

        ));

    }
}
