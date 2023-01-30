<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $validImgUrls = collect([
            'https://fujifilm-x.com/wp-content/uploads/2021/01/gfx100s_sample_04_thum-1.jpg',
            'https://www.cameraegg.org/wp-content/uploads/2015/06/canon-powershot-g3-x-sample-images-1.jpg',
            'https://fujifilm-x.com/wp-content/uploads/2019/08/xc16-50mmf35-56-ois-2_sample-images03.jpg',
            'https://nikonrumors.com/wp-content/uploads/2014/03/Nikon-1-V3-sample-photo.jpg',
            'https://live.staticflickr.com/3935/15607410112_004c958f33_b.jpg',
            'https://www.isixsigma.com/wp-content/uploads/2019/09/The-Importance-of-Sample-Size.jpg',
            'https://cdn.pixabay.com/photo/2022/01/28/18/32/leaves-6975462__340.png',
            'https://storage.googleapis.com/pod_public/1300/88149.jpg',
            'https://i.pinimg.com/736x/44/29/f0/4429f02128255f000ff0f11e03fc2cb2.jpg',
            'https://img.freepik.com/free-photo/wide-angle-shot-single-tree-growing-clouded-sky-during-sunset-surrounded-by-grass_181624-22807.jpg',
            'https://www.rd.com/wp-content/uploads/2020/04/GettyImages-1093840488-5-scaled.jpg',
        ]);

        return [
            'title' => fake()->words(3, true),
            'description' => fake()->sentences(3, true),
            'image_url' => $validImgUrls->random(5),
        ];
    }
}
