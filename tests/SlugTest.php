<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Helpers\Slugs;

class SlugTest extends TestCase
{
    /**
     * @test
     */
    public function make_a_slug_from_string()
    {
    	$string = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';

    	$slugs = new Slugs($string);

    	$slug = $slugs->make();

        $this->assertEquals(str_slug($string), $slug);
    }

    /**
     * @test
     */
    public function make_a_slug_with_timestamp_provided()
    {
    	$string = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';

    	$timestamp = \Carbon\Carbon::now()->toDateTimeString();

    	$slugs = new Slugs($string);

    	$slug = $slugs->makeWithTimeStamp($timestamp);

        $this->assertEquals(str_slug($string.'-'.$timestamp), $slug);
    }

    /**
     * @test
     */
    public function make_a_slug_with_date_provided()
    {
    	$string = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';

    	$timestamp = \Carbon\Carbon::now()->toDateString();

    	$slugs = new Slugs($string);

    	$slug = $slugs->makeWithDate($timestamp);

        $this->assertEquals(str_slug($string.'-'.$timestamp), $slug);
    }

    /**
     * @test
     */
    public function make_a_slug_with_timestamp_not_provided()
    {
    	$string = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';

    	$timestamp = \Carbon\Carbon::now()->toDateTimeString();

    	$slugs = new Slugs($string);

    	$slug = $slugs->makeWithTimeStamp();

        $this->assertEquals(str_slug($string.'-'.$timestamp), $slug);
    }

    /**
     * @test
     */
    public function make_a_slug_with_date_not_provided()
    {
    	$string = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';

    	$timestamp = \Carbon\Carbon::now()->toDateString();

    	$slugs = new Slugs($string);

    	$slug = $slugs->makeWithDate();

        $this->assertEquals(str_slug($string.'-'.$timestamp), $slug);
    }
}
