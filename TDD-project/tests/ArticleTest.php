<?php

use PHPUnit\Framework\TestCase;
use TDDProject\App\Article;

class ArticleTest extends TestCase
{
    protected $article;

    protected function setUp(): void
    {
        $this->article = new Article();
    }
    public function testArticleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(),"");
    }

//    public function testSlugHasSpacesReplacedByUnderscores()
//    {
//        $this->article->title = 'An example title';
//
//        $this->assertEquals($this->article->getSlug(), 'An_example_title');
//    }
//
//    public function testSlugHasWhitespaceReplacedBySingleUnderscore()
//    {
//        $this->article->title = "An    example    \n    title";
//
//        $this->assertEquals($this->article->getSlug(), 'An_example_title');
//    }
//
//    public function testSlugDoesNotStartOrEndWithAnUnderscore()
//    {
//        $this->article->title = ' An example title ';
//
//        $this->assertEquals($this->article->getSlug(), 'An_example_title');
//    }
//
//    public function testSlugDoesNotHaveAnyNonWordCharacters()
//    {
//        $this->article->title = 'Read! This! Now!';
//
//        $this->assertEquals($this->article->getSlug(), 'Read_This_Now');
//    }

    public static function titleProvider()
    {
        return [
            'Slug Has Spaces Replaced By Underscores'
            => ['An example title', 'An_example_title'],
            'Slug Has Whitespace By Single Underscore'
            => ["An    example    \n    title", 'An_example_title'],
            'Slug Does Not Start Or End With An Underscore'
            => [' An example title ', 'An_example_title'],
            'Slug Does Not Have Any Non Word Characters'
            => ['Read! This! Now!', 'Read_This_Now']
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;

        $this->assertEquals($this->article->getSlug(), $slug);
    }
}