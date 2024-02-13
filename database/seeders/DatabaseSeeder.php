<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Description;
use App\Models\Type;
use App\Models\Term;
use App\Models\User;
use App\Models\Idea;
use App\Models\Language;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $type1 = Type::create([
            'name' => 'DWES',
            'model' => 'term'
        ]);

        $type2 = Type::create([
            'name' => 'DWEC',
            'model' => 'term'
        ]);

        $type3 = Type::create([
            'name' => 'DIW',
            'model' => 'term'
        ]);

        $type4 = Type::create([
            'name' => 'Professor',
            'model' => 'user'
        ]);

        $type5 = Type::create([
            'name' => 'Student',
            'model' => 'user'
        ]);

        //User::factory(5)->create();

        $user1 = User::factory()->create([
            'type_id' => $type4->id
        ]);
        $user2 = User::factory()->create([
            'type_id' => $type4->id
        ]);
        $user3 = User::factory()->create([
            'type_id' => $type5->id
        ]);
        $user4 = User::factory()->create([
            'type_id' => $type5->id
        ]);
        $user5 = User::factory()->create([
            'type_id' => $type4->id
        ]);

        $es = Language::create([
            'iso_code' => 'es',
            'name' => 'Español'
        ]);

        $en = Language::create([
            'iso_code' => 'en',
            'name' => 'English'
        ]);

        $va = Language::create([
            'iso_code' => 'va',
            'name' => 'Valencià'
        ]);

        $fr = Language::create([
            'iso_code' => 'fr',
            'name' => 'Français'
        ]);

        $de = Language::create([
            'iso_code' => 'de',
            'name' => 'Deutsch'
        ]);

        $term1 = Term::create([
            'name' => 'Lenguaje PHP',
            'type_id' => $type1->id,
            'language_id' => $es->id,
        ]);

        $term2 = Term::create([
            'name' => 'Language PHP',
            'type_id' => $type1->id,
            'language_id' => $en->id,
        ]);

        $term3 = Term::create([
            'name' => 'Lenguaje JavaScript',
            'type_id' => $type2->id,
            'language_id' => $es->id,
        ]);

        $term4 = Term::create([
            'name' => 'Language JavaScript',
            'type_id' => $type2->id,
            'language_id' => $en->id,
        ]);

        $term5 = Term::create([
            'name' => 'Llenguatge JavaScript',
            'type_id' => $type2->id,
            'language_id' => $va->id,
        ]);

        $desc1 = Description::create([
            'user_id' => $user1->id,
            'term_id' => $term5->id,
            'language_id' => $va->id,
            'name' => 'Descripció del Llenguatge JavaScript en Valencià',
            'notes' => '<p>Aquesta descripció se centra en els conceptes fonamentals del llenguatge JavaScript, incloent la seva sintaxi, estructures de control i funcions essencials.</p>',
            'synthesis' => '<p>El llenguatge JavaScript és una eina potent per a la programació web, permetent als desenvolupadors crear aplicacions interactives i dinàmiques en el navegador de l\'usuari.</p>',

        ]);

        $desc2 = Description::create([
            'user_id' => $user2->id,
            'term_id' => $term2->id,
            'language_id' => $en->id,
            'name' => 'Description of PHP Language',
            'notes' => '<p>This description focuses on the fundamental concepts of the PHP language, including syntax, control structures, and essential functions.</p>',
            'synthesis' => '<p>PHP is a widely-used scripting language that is especially suited for web development and can be embedded into HTML. It offers a wide range of functionality for creating dynamic and interactive web pages.</p>',
        ]);

        $desc3 = Description::create([
            'user_id' => $user3->id,
            'term_id' => $term1->id,
            'language_id' => $es->id,
            'name' => 'Descripción de PHP',
            'notes' => '<p>Esta descripción se centra en los conceptos fundamentales del lenguaje PHP, incluyendo la sintaxis, estructuras de control y funciones esenciales.</p>',
            'synthesis' => '<p>PHP es un lenguaje de script ampliamente utilizado que es especialmente adecuado para el desarrollo web y puede ser incrustado en HTML. Ofrece una amplia gama de funcionalidades para crear páginas web dinámicas e interactivas.</p>',
        ]);

        $desc4 = Description::create([
            'user_id' => $user4->id,
            'term_id' => $term4->id,
            'language_id' => $en->id,
            'name' => 'Description of JavaScript Language',
            'notes' => '<p>This description provides an overview of the JavaScript language, covering its syntax, features, and usage in web development.</p>',
            'synthesis' => '<p>JavaScript is a versatile scripting language commonly used for client-side web development. It enables interactive and dynamic features on web pages, enhancing user experience and interactivity.</p>',
        ]);

        $desc5 = Description::create([
            'user_id' => $user5->id,
            'term_id' => $term5->id,
            'language_id' => $va->id,
            'name' => 'Descripció de JavaScript',
            'notes' => '<p>Aquesta descripció proporciona una visió general del llenguatge JavaScript, cobrint la seva sintaxi, característiques i ús en el desenvolupament web.</p>',
            'synthesis' => '<p>JavaScript és un llenguatge de script versàtil utilitzat principalment per al desenvolupament web al costat del client. Permet funcionalitats interactives i dinàmiques a les pàgines web, millorant l\'experiència i interactivitat de l\'usuari.</p>',
        ]);

        $idea1 = Idea::create([
            'name' => 'Desarrollo web con PHP y JavaScript',
            'language_id' => $es->id,
            'description_id' => $desc1->id,
        ]);

        $idea2 = Idea::create([
            'name' => 'Web Development with PHP and JavaScript',
            'language_id' => $en->id,
            'description_id' => $desc2->id,
        ]);

        $idea3 = Idea::create([
            'name' => 'Gestió d\'esdeveniments en JavaScript',
            'language_id' => $va->id,
            'description_id' => $desc1->id,
        ]);

        $idea4 = Idea::create([
            'name' => 'Control Structures Usage in PHP',
            'language_id' => $en->id,
            'description_id' => $desc2->id,
        ]);

        $idea5 = Idea::create([
            'name' => 'Implementación de clases en PHP',
            'language_id' => $es->id,
            'description_id' => $desc3->id,
        ]);

        // Agregar relaciones a la tabla term_user
        $user1->terms()->attach($term1->id);
        $user2->terms()->attach($term2->id);
        $user3->terms()->attach($term3->id);
        $user4->terms()->attach($term4->id);
        $user5->terms()->attach($term5->id);

        // Agregar relaciones a la tabla user_description
        $user1->valuations()->attach($desc1, ['rating' => 5]);
        $user2->valuations()->attach($desc2, ['rating' => 4]);
        $user3->valuations()->attach($desc3, ['rating' => 3]);
        $user4->valuations()->attach($desc4, ['rating' => 5]);
        $user5->valuations()->attach($desc5, ['rating' => 2]);

    }
}
