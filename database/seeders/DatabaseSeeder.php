<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $user = User::factory()->create();

         $category1 = Category::create([
             'name' => 'Personal',
             'slug' => 'personal',
         ]);

        $category2 = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        $category3 = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies',
        ]);

        Post::create([
            'title'         => 'Etiam pellentesque, lectus ac ornare gravida, arcu justo ultricies lectus',
            'excerpt'       => 'Duis velit tellus, dictum a velit quis, consectetur interdum ligula.',
            'body'          => 'Duis velit tellus, dictum a velit quis, consectetur interdum ligula. Ut at urna vel turpis viverra ullamcorper. Nullam ut purus et nibh consectetur gravida non a magna. Mauris viverra, turpis condimentum sagittis fermentum, velit justo gravida leo, vel gravida neque nisl eu nulla. Pellentesque eu ullamcorper dolor. Curabitur a laoreet nisi. Nulla a dolor suscipit, pellentesque quam a, congue felis. Nullam turpis risus, tincidunt quis tincidunt sed, consequat sed ex.

Maecenas finibus tristique sapien, porta sollicitudin massa egestas nec. Vivamus mollis pulvinar est id malesuada. Praesent sit amet viverra sem, sit amet ornare sapien. Phasellus ut convallis est. Donec a gravida nunc. Etiam cursus commodo tellus ac aliquam. Integer ut egestas mi, eget mollis metus. Suspendisse fringilla ex et libero pulvinar, vitae sollicitudin eros vulputate. Nulla tempor tristique magna, in posuere urna pharetra et. Donec et faucibus leo. Fusce commodo ante et lectus commodo, ut iaculis ipsum aliquam. Curabitur purus libero, tincidunt sit amet neque dictum, lacinia sollicitudin odio.

Mauris scelerisque orci nibh, eget tempus dolor euismod nec. Donec lobortis ornare venenatis. Donec dictum dignissim tellus, id venenatis diam finibus quis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec sem nisi, interdum ac erat et, condimentum aliquet quam. Sed sapien tortor, euismod vel maximus vel, interdum sit amet metus. Duis commodo lacus urna, quis tempor sapien semper eu. Donec finibus accumsan lectus. Mauris tellus sem, venenatis sed arcu eget, placerat blandit neque. Fusce vel massa nec velit ultricies porta. Pellentesque efficitur bibendum mollis.

Aliquam erat volutpat. Praesent pharetra tellus id nibh consectetur laoreet. Integer suscipit elit nunc, commodo ultrices felis iaculis ut. Praesent in eleifend est. Sed auctor leo in scelerisque laoreet. Donec turpis tortor, dictum sed magna nec, dictum condimentum arcu. Nam lorem erat, sollicitudin sit amet nisl sed, posuere egestas erat. Vestibulum tincidunt, nunc at commodo mattis, nisl magna vestibulum lacus, nec accumsan ipsum mauris non magna.

Ut lobortis orci eu leo gravida, eget consequat ipsum facilisis. Sed fringilla nulla ac mi lobortis molestie. Curabitur lacinia ullamcorper condimentum. Proin sed ex ultrices, fermentum diam sed, imperdiet lectus. Quisque vulputate sodales lectus, eu commodo arcu euismod sit amet. Duis vel venenatis magna. Vestibulum odio justo, suscipit laoreet urna eget, pharetra pulvinar leo. Quisque vel varius nunc, quis porttitor risus. Sed sed nisl faucibus, vestibulum augue ac, vehicula leo. Pellentesque vitae dui non libero mattis luctus vel mattis nisl. Pellentesque pretium, leo eget pharetra blandit, libero erat mollis metus, ac suscipit massa dui non libero. Cras lacinia lorem quis libero pharetra, tempor tincidunt odio tempor.',
            'slug'          => Str::slug('Etiam pellentesque, lectus ac ornare gravida, arcu justo ultricies lectus'),
            'category_id'   => $category1->id,
            'user_id'       => $user->id,
            'published_at'  => '2021-04-23 05:50:27',
        ]);

        Post::create([
            'title'         => 'Sed aliquam, augue nec tincidunt',
            'excerpt'       => 'Proin tempor scelerisque auctor. Ut et mi quis turpis egestas volutpat.',
            'body'          => 'Proin tempor scelerisque auctor. Ut et mi quis turpis egestas volutpat. Mauris et enim eget lacus interdum malesuada. Nunc bibendum ipsum in dapibus iaculis. Duis ornare diam ac pretium dignissim. Pellentesque ex lorem, tincidunt non enim eu, commodo malesuada sapien. Morbi scelerisque pretium felis in scelerisque. Nam scelerisque convallis ante nec lacinia. Fusce et consectetur tellus. Fusce maximus faucibus elementum. Donec fermentum mattis nisl id cursus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam iaculis vehicula ante a posuere. Nam sed sollicitudin eros.

Vivamus pulvinar viverra augue, in aliquam odio. Mauris ante lacus, iaculis eu quam faucibus, consequat varius nisi. Phasellus egestas vitae ante non scelerisque. Integer ornare sapien in tempus consectetur. Vivamus ut massa neque. Phasellus nisl mi, ultrices sed libero sed, cursus mattis nisi. Praesent bibendum enim sem, et consequat nunc tempor nec.

Nulla tellus dolor, pulvinar sed feugiat id, hendrerit sed urna. Pellentesque sed molestie neque, vitae laoreet leo. Vestibulum gravida venenatis leo in lobortis. Mauris interdum purus nec sapien pellentesque, a vulputate leo tempus. Nulla mollis lectus dapibus dolor cursus, non viverra augue congue. Maecenas sagittis felis metus. Fusce sollicitudin bibendum aliquam. Fusce sit amet turpis et justo sagittis semper. Fusce porttitor sodales nibh, eu mattis lacus sodales nec. Praesent et arcu metus. Donec varius, metus ac blandit dictum, turpis sem facilisis massa, id accumsan leo ligula ac sapien. Proin eget efficitur magna. Nullam mattis felis nunc, vel porta arcu accumsan sed. Quisque interdum enim et lorem bibendum iaculis. Mauris ultricies quis enim ac ultrices.

Nullam eleifend lacinia est, quis tempor quam iaculis quis. Praesent eleifend sapien sed turpis efficitur blandit. Maecenas vehicula arcu justo, vel malesuada magna egestas eget. Nullam eget dui odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse at mi consequat orci congue finibus sit amet vel libero. Etiam et metus accumsan, tempus dui eleifend, porta odio. Nulla facilisi. Donec quam enim, tempus ut massa pretium, commodo suscipit libero. Praesent pellentesque felis id libero blandit auctor.

In hac habitasse platea dictumst. Maecenas vitae pellentesque eros. In vel velit bibendum ante ornare tincidunt. Nunc sit amet tortor elit. Fusce bibendum finibus molestie. In sit amet luctus elit, at imperdiet velit. Cras sed felis tellus. Aliquam erat volutpat.',
            'slug'          => Str::slug('Sed aliquam, augue nec tincidunt'),
            'category_id'   => $category2->id,
            'user_id'       => $user->id,
            'published_at'  => '2021-04-18 05:50:27',
        ]);

        Post::create([
            'title'         => 'Clase aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos',
            'excerpt'       => 'Ut dui sem, elementum sed justo quis, pellentesque euismod nisi.',
            'body'          => 'Ut dui sem, elementum sed justo quis, pellentesque euismod nisi. Praesent non iaculis est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus ac nibh ac nulla pulvinar elementum vitae eget nunc. Mauris a volutpat enim, sed euismod sem. Quisque interdum lectus mauris, in pretium metus pharetra eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas pulvinar mauris dignissim ante vehicula dictum. Phasellus in erat mi. Fusce sed quam egestas mauris dignissim consequat in et justo. Curabitur vestibulum est risus, tristique feugiat enim rutrum quis. Phasellus eget nibh metus. Nam pellentesque erat non sem auctor tristique. Vestibulum dictum sit amet metus ut interdum.

Quisque eget neque quis dui fermentum posuere eleifend et felis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam eu orci eu felis pretium vehicula nec sit amet nibh. Donec ut justo ut mauris vehicula fringilla ac nec nulla. Sed laoreet ut massa a faucibus. Nulla faucibus sem sapien, et scelerisque mi auctor id. Vestibulum rutrum sodales metus sit amet viverra. Sed varius in nisi at rhoncus. Donec consequat tincidunt gravida. Aliquam in sem nec augue molestie molestie. Maecenas dictum, augue in facilisis luctus, nunc nibh pretium quam, non tincidunt odio felis quis nulla. Nunc rutrum eleifend arcu, eu pharetra neque bibendum id.

Aliquam id viverra mi, ac placerat lectus. Nam feugiat ex a pharetra commodo. Cras feugiat justo id lorem vehicula, eu malesuada dui ultrices. Nullam dictum nibh sed augue elementum, et vulputate dui rhoncus. Integer ut nulla urna. In ullamcorper posuere convallis. Morbi non nulla a eros iaculis consectetur at efficitur lorem. Cras finibus, erat at lobortis interdum, mi augue porttitor quam, a congue mauris nisl sed metus. Praesent mi dui, ullamcorper vitae tincidunt vel, luctus et ipsum. Cras facilisis ex quam, vel hendrerit nulla vulputate fringilla. Aliquam at nisl dignissim, maximus justo vel, lobortis lectus. Nulla malesuada rhoncus urna. Maecenas aliquet orci nec vulputate commodo.

Etiam ut urna quis ex lacinia placerat. Suspendisse rhoncus gravida metus et pharetra. Nam efficitur venenatis ex id interdum. Phasellus sem lectus, semper in tellus in, sagittis interdum neque. Sed quis feugiat nisl. Suspendisse lacus mauris, accumsan nec efficitur eget, vehicula porta nisl. Duis condimentum sapien et tempus semper. Donec sagittis sit amet libero ut mollis. Aenean eu justo id nunc sagittis iaculis.

Ut volutpat venenatis justo, id volutpat dolor imperdiet a. Morbi sed sem est. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris enim justo, condimentum ut justo in, cursus faucibus nulla. Integer dictum viverra interdum. Etiam justo eros, varius ut euismod et, vestibulum eu risus. Etiam posuere ante sapien, sit amet eleifend nulla vehicula id. Suspendisse sit amet interdum nisi.',
            'slug'          => Str::slug('Clase aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos'),
            'category_id'   => $category3->id,
            'user_id'       => $user->id,
            'published_at'  => '2021-04-13 05:50:27',
        ]);

    }
}
