use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


if (!Schema::hasColumn('themes', 'html')) {
    Schema::table('themes', function (Blueprint $table) {
        $table->longText('html')->nullable();
    });
}

DB::table('themes')->where('identifier', 'fashion')->update([
      'html' => json_encode(["header","hero_banner","category","featured","header_top","header","hero_banner","featured","featured_collection","new_arrival","gallery","testimonials","brands","blog","footer"])
  ]);
DB::table('themes')->where('identifier', 'grocery')->update([
      'html' => json_encode(["header_top","header","hero_banner","featured","popular_product","ads","top_sale","best_deal","testimonials","blog","footer"])
  ]);
DB::table('themes')->where('identifier', 'sports')->update([
      'html' => json_encode(["header_top","header","hero_banner","featured_category","popular_products","discount","top_products","follow","testimonials","blog","footer"])
]);
DB::table('themes')->where('identifier', 'shoe')->update([
      'html' => json_encode(["header","hero_banner","belt","category","feature","brand","new_arrivals","offer","testimonials","footer"])
]);
DB::table('themes')->where('identifier', 'pet')->update([
      'html' => json_encode(["header","hero_banner","category","top_products","expert","etssentials_products","bundle_save","follow","blog","footer"])
]);
DB::table('themes')->where('identifier', 'bags')->update([
      'html' => json_encode(["header","hero_banner","brand","category","best_sellings","choose","lifestyle","blog","testimonials","inspiration","footer"])
]);
DB::table('themes')->where('identifier', 'fitness')->update([
      'html' => json_encode(["header_top","header","hero_banner","text_slider","category","best_selling","fitness_goal","highlights","ambasador","testimonials","footer"])
]);
DB::table('themes')->where('identifier', 'travel')->update([
      'html' => json_encode(["header","hero_banner","category","tranding_products","kit","trust_us","testimonials","adventure","promotion","blog","footer"])
]);
DB::table('themes')->where('identifier', 'furniture')->update([
      'html' => json_encode(["header_top","header","hero_banner","category","popular_products","discount","feature_items","testimonials","blog","footer"])
]);
DB::table('themes')->where('identifier', 'drinks')->update([
      'html' => json_encode(["header_top","header","hero_banner","explore","top_products","text_slide","offer_timer","keep_it","season_products","testimonials","blog","shippings","footer"])
]);
DB::table('themes')->where('identifier', 'watch')->update([
      'html' => json_encode(["header","hero_banner","brand","category","feature_collection","highlights","design_collection","testimonials","choose_us","footer"])
]);
DB::table('themes')->where('identifier', 'perfume')->update([
      'html' => json_encode(["header","hero_banner","category","best_seller_products","why_chose","limited_offer","testimonials","season","motion","footer"])
]);
DB::table('themes')->where('identifier', 'baby')->update([
      'html' => json_encode(["header_top","header","hero_banner","benefit","category","tranding","new_arrival","news_insight","seasonal_collection","testimonials","footer"])
]);
DB::table('themes')->where('identifier', 'coffee')->update([
      'html' => json_encode(["header","hero_banner","feature_category","best_seller","brewing_guides","feature_product","testimonials","subscription","sustainability","notice","footer"])
]);
DB::table('themes')->where('identifier', 'car-dark')->update([
      'html' => json_encode(["header","hero_banner","brand","category","top_products","seasonal_products","features","how_to_area","why_choose","testimonials","footer"])
]);
DB::table('themes')->where('identifier', 'car-light')->update([
      'html' => json_encode(["header_top","header","hero_banner","brand","category","best_seller","summer_sale","car_tips","features","testimonials","feature_brand","footer"])
]);
DB::table('themes')->where('identifier', 'music')->update([
      'html' => json_encode(["header_top","header","hero_banner","category","limited-deal","new_arrivals","bundle","testimonials","blog","brand","footer"])
]);
DB::table('themes')->where('identifier', 'men-clothing')->update([
      'html' => json_encode(["header","hero_banner","brand","category","latest_product","style_tab","seasonal","why_choose","limited_deal","blog","testimonials","footer"])
]);
DB::table('themes')->where('identifier', 'women-clothing')->update([
      'html' => json_encode(["header_top","header","hearo_banner","category","trending","seasonal","promotional","style_it","testimonials","blog","why_choose_us","footer"])
]);
DB::table('themes')->where('identifier', 'travel-dark')->update([
      'html' => json_encode(["header","hero_banner","brand","category","trending_product","kit_area","trust_area","testimonials","advanture","promotion","blog","footer"])
]);
DB::table('themes')->where('identifier', 'watch-dark')->update([
      'html' => json_encode(["header_top","header","hero_banner","brand","category","feature_collection","highlight","featured_collection","testimonials","why_choose","footer"])
]);
