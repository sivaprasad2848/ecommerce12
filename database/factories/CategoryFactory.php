<?php
namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->words(2, true);
        return [
            'catTitle' => $title,
            'catSlug' => Str::slug($title),
        ];
    }
}
?>
