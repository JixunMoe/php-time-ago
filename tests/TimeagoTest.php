<?php

namespace Westsworld\TimeAgo\Tests;

use Westsworld\TimeAgo;
use PHPUnit\Framework\TestCase;
use DateTime;
use DateInterval;

/**
 * Testing timeago dates
 * @author jimmiw
 * @since 2016-03-11
 */
class TimeagoTest extends TestCase
{
    public function testIsAlive()
    {
        $this->assertTrue(true);
    }

    public function te1stInit()
    {
        $timeAgo = new TimeAgo();
        $this->assertNotNull($timeAgo);
    }

    /**
     * Tests the old core functionality, by being in the same timezone and not changing language.
     */
    public function testTimeAgoInWords()
    {
        $timeAgo = new TimeAgo();

        // testing "less than a minute"
        $this->assertEquals('just now', $timeAgo->inWordsFromStrings("now"));
        $this->assertEquals('just now', $timeAgo->inWordsFromStrings("-1 second"));
        $this->assertEquals('just now', $timeAgo->inWordsFromStrings("-29 second"));
        $this->assertNotEquals('just now', $timeAgo->inWordsFromStrings("-30 second"));
        // testing "1 minute"
        $this->assertEquals('a minute ago', $timeAgo->inWordsFromStrings("-30 second"));
        $this->assertEquals('a minute ago', $timeAgo->inWordsFromStrings("-60 second"));
        $this->assertEquals('a minute ago', $timeAgo->inWordsFromStrings("-89 second"));
        $this->assertNotEquals('a minute ago', $timeAgo->inWordsFromStrings("-90 second"));
        

        // testing 2..44 minutes
        $this->assertContains('minutes ago', $timeAgo->inWordsFromStrings("-2 minute"));
        $this->assertContains('minutes ago', $timeAgo->inWordsFromStrings("-2 minute -40 second"));
        $this->assertContains('minutes ago', $timeAgo->inWordsFromStrings("-44 minute"));
        $this->assertContains('minutes ago', $timeAgo->inWordsFromStrings("-44 minute -29 second"));
        $this->assertNotContains('minutes ago', $timeAgo->inWordsFromStrings("-44 minute -30 second"));

        // testing about 1 hour
        $this->assertEquals('about an hour ago', $timeAgo->inWordsFromStrings("-44 minute -30 second"));
        $this->assertEquals('about an hour ago', $timeAgo->inWordsFromStrings("-89 minute -29 second"));
        $this->assertNotEquals('about an hour ago', $timeAgo->inWordsFromStrings("-90 minute"));

        // testing about 2..24 hours
        $this->assertEquals('2 hours ago', $timeAgo->inWordsFromStrings("-90 minute"));
        $this->assertEquals('2 hours ago', $timeAgo->inWordsFromStrings("-110 minute"));
        $this->assertContains('hours ago', $timeAgo->inWordsFromStrings("-23 hour -59 minute -29 second"));
        $this->assertNotContains('hours ago', $timeAgo->inWordsFromStrings("-23 hour -59 minute -30 second"));
        $this->assertNotContains('hours ago', $timeAgo->inWordsFromStrings("-24 hour"));

        // testing 1 day
        $this->assertEquals('one day ago', $timeAgo->inWordsFromStrings("-23 hour -59 minute -30 second"));
        $this->assertEquals('one day ago', $timeAgo->inWordsFromStrings("-47 hour -59 minute -29 second"));
        $this->assertNotEquals('one day ago', $timeAgo->inWordsFromStrings("-47 hour -59 minute -30 second"));

        // testing 2..24 days
        $this->assertContains('days ago', $timeAgo->inWordsFromStrings("-47 hour -59 minute -30 second"));
        $this->assertContains('days ago', $timeAgo->inWordsFromStrings("-29 day -23 hour -59 minute -29 second"));
        $this->assertNotContains('days ago', $timeAgo->inWordsFromStrings("-29 day -23 hour -59 minute -30 second"));

        // testing 1 month
        $this->assertEquals('about one month ago', $timeAgo->inWordsFromStrings("-29 day -23 hour -59 minute -30 second"));
        $this->assertEquals('about one month ago', $timeAgo->inWordsFromStrings("-59 day -23 hour -59 minute -29 second"));
        $this->assertNotEquals('about one month ago', $timeAgo->inWordsFromStrings("-59 day -23 hour -59 minute -30 second"));

        // testing 2..12 months
        $this->assertContains('months ago', $timeAgo->inWordsFromStrings("-59 day -23 hour -59 minute -30 second"));

        // seemed to be the easiest way to get 1 year - 1 second, which should be the day before 1 year ago :)
        $oneYearAgo = strtotime("-1 year");
        // NOTE: this fails around leap years... so... -2 days must be accurate enough
        $twoDays = (2*86400); // 2 days in seconds
        $this->assertContains('months ago', $timeAgo->inWordsFromStrings(date('c', $oneYearAgo + $twoDays)));
        $this->assertNotContains('months ago', $timeAgo->inWordsFromStrings(date('c', $oneYearAgo)));

        // testing 1 year
        $this->assertContains('one year ago', $timeAgo->inWordsFromStrings(date('c', $oneYearAgo - $twoDays)));
        $twoYearsAgo = strtotime("-2 year");
        $this->assertContains('one year ago', $timeAgo->inWordsFromStrings(date('c', $twoYearsAgo + $twoDays)));
        $this->assertNotContains('one year ago', $timeAgo->inWordsFromStrings(date('c', $twoYearsAgo)));

        // testing 2 years or more
        $this->assertEquals('over 2 years ago', $timeAgo->inWordsFromStrings("-2 year"));
        $this->assertEquals('over 2 years ago', $timeAgo->inWordsFromStrings("-2 year - 59 day"));
        $this->assertEquals('over 3 years ago', $timeAgo->inWordsFromStrings("-3 year"));
        $this->assertEquals('over 4 years ago', $timeAgo->inWordsFromStrings("-4 year"));
        $this->assertEquals('over 5 years ago', $timeAgo->inWordsFromStrings("-5 year"));
        $this->assertEquals('over 6 years ago', $timeAgo->inWordsFromStrings("-6 year"));
        $this->assertEquals('over 7 years ago', $timeAgo->inWordsFromStrings("-7 year"));
        $this->assertEquals('over 8 years ago', $timeAgo->inWordsFromStrings("-8 year"));
        $this->assertEquals('over 9 years ago', $timeAgo->inWordsFromStrings("-9 year"));
        $this->assertEquals('over 10 years ago', $timeAgo->inWordsFromStrings("-10 year"));
        // you get the point right?...
    }

    public function testTimeAgoInWordsDateTime()
    {
        $timeAgo = new TimeAgo(new \Westsworld\TimeAgo\Translations\En());
        
        // testing "less than a minute"
        $this->assertEquals('just now', $timeAgo->inWords(new DateTime()));
        $this->assertEquals('just now', $timeAgo->inWords((new DateTime())->sub(new DateInterval('PT1S'))));
        $this->assertEquals('just now', $timeAgo->inWords((new DateTime())->sub(new DateInterval('PT29S'))));
        $this->assertNotEquals('just now', $timeAgo->inWords((new DateTime())->sub(new DateInterval('PT30S'))));

        // testing "1 minute"
        $this->assertEquals('a minute ago', $timeAgo->inWords((new DateTime())->sub(new DateInterval('PT30S'))));
        $this->assertEquals('a minute ago', $timeAgo->inWords((new DateTime())->sub(new DateInterval('PT60S'))));
        $this->assertEquals('a minute ago', $timeAgo->inWords((new DateTime())->sub(new DateInterval('PT89S'))));
        $this->assertNotEquals('a minute ago', $timeAgo->inWords((new DateTime())->sub(new DateInterval('PT90S'))));
    }

    public function testLanguage()
    {
        // using default (english)
        $timeAgo = new TimeAgo();
        $this->assertEquals('just now', $timeAgo->inWords(new DateTime()));

        // switching to danish
        $timeAgo = new TimeAgo(new \Westsworld\TimeAgo\Translations\Da());
        $this->assertEquals('mindre end et minut siden', $timeAgo->inWords(new DateTime()));

        // switching to german
        $timeAgo = new TimeAgo(new \Westsworld\TimeAgo\Translations\De());
        $this->assertEquals('vor weniger als einer Minute', $timeAgo->inWords(new DateTime()));
    }
}
