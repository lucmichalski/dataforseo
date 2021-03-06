<?php

namespace BoolXY\DataForSEO\Tests;

use BoolXY\DataForSEO\Requests\OnPage\GetBrokenPagesRequest;
use BoolXY\DataForSEO\Requests\OnPage\GetDuplicatePagesRequest;
use BoolXY\DataForSEO\Requests\OnPage\GetFilteredPagesRequest;
use BoolXY\DataForSEO\Requests\OnPage\GetHTagsOnPageRequest;
use BoolXY\DataForSEO\Requests\OnPage\GetImagesOnPageRequest;
use BoolXY\DataForSEO\Requests\OnPage\GetLinksFromPageRequest;
use BoolXY\DataForSEO\Requests\OnPage\GetLinksToPageRequest;
use BoolXY\DataForSEO\Requests\OnPage\GetPagesRequest;
use BoolXY\DataForSEO\Requests\OnPage\GetTaskResultSummaryRequest;
use BoolXY\DataForSEO\Requests\OnPage\GetTasksStatusRequest;
use BoolXY\DataForSEO\Requests\OnPage\SettingTasksRequest;
use BoolXY\DataForSEO\DataForSEO;

class OnPageApiTest extends TestCase
{
    private $dfs;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dfs = DataForSEO::create($this->client);
    }

    /** @test */
    public function testSettingTasks()
    {
        $data = [];
        $my_unq_id = mt_rand(0, 30000000);

        $data[$my_unq_id] = [
            "site" => "ranksonic.com",
            "crawl_max_pages" => 10,
        ];

        $result = $this->dfs
            ->setRequest(SettingTasksRequest::create($data))
            ->get();

        $this->assertEquals("ok", $result->status);
    }

    /** @test */
    public function testGetTasksStatus()
    {
        $result = $this->dfs
            ->setRequest(GetTasksStatusRequest::create())
            ->get();

        $this->assertEquals("ok", $result->status);
    }

    /** @test */
    public function testGetTaskResultSummary()
    {
        $data = [
            "task_id" => 123456789,
        ];

        $result = $this->dfs
            ->setRequest(GetTaskResultSummaryRequest::create($data))
            ->get();

        $this->assertEquals("ok", $result->status);
    }

    /** @test */
    public function testGetPages()
    {
        $data = [
            "task_id" => 123456789,
        ];

        $result = $this->dfs
            ->setRequest(GetPagesRequest::create($data))
            ->get();

        $this->assertEquals("ok", $result->status);
    }

    /** @test */
    public function testGetFilteredPages()
    {
        $data = [
            [
                "task_id" => 151668277,
                "limit" => 1000,
                "offset" => 0,
                "filters" => [
                    ["h1_count", "=", 0],
                    ["content_count_words", ">", 200],
                ],
            ],
        ];

        $result = $this->dfs
            ->setRequest(GetFilteredPagesRequest::create($data))
            ->get();

        $this->assertEquals("ok", $result->status);
    }

    /** @test */
    public function testGetBrokenPages()
    {
        $data = [
            "task_id" => 123456789,
        ];

        $result = $this->dfs
            ->setRequest(GetBrokenPagesRequest::create($data))
            ->get();

        $this->assertEquals("ok", $result->status);
    }

    /** @test */
    public function testGetDuplicatePages()
    {
        $data = [
            "task_id" => 123456789,
        ];

        $result = $this->dfs
            ->setRequest(GetDuplicatePagesRequest::create($data))
            ->get();

        $this->assertEquals("ok", $result->status);
    }

    /** @test */
    public function testGetLinksToPage()
    {
        $data = [
            "task_id" => 123456789,
            "page" => "'/relative/page/on/site.html'",
        ];

        $result = $this->dfs
            ->setRequest(GetLinksToPageRequest::create($data))
            ->get();

        $this->assertEquals("ok", $result->status);
    }

    /** @test */
    public function testGetLinksFromPage()
    {
        $data = [
            "task_id" => 123456789,
            "page" => "'/relative/page/on/site.html'",
        ];

        $result = $this->dfs
            ->setRequest(GetLinksFromPageRequest::create($data))
            ->get();

        $this->assertEquals("ok", $result->status);
    }

    /** @test */
    public function testGetHTagsOnPage()
    {
        $data = [
            "task_id" => 123456789,
            "page" => "'/relative/page/on/site.html'",
        ];

        $result = $this->dfs
            ->setRequest(GetHTagsOnPageRequest::create($data))
            ->get();

        $this->assertEquals("ok", $result->status);
    }

    /** @test */
    public function testGetImagesOnPage()
    {
        $data = [
            "task_id" => 123456789,
            "page" => "'/relative/page/on/site.html'",
        ];

        $result = $this->dfs
            ->setRequest(GetImagesOnPageRequest::create($data))
            ->get();

        $this->assertEquals("ok", $result->status);
    }
}
