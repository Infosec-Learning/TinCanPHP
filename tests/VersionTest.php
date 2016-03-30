<?php
/*
    Copyright 2014 Rustici Software

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
*/

namespace TinCanTest;

use TinCan\Version;

class VersionTest extends \PHPUnit_Framework_TestCase {
    public function testSupported() {
        $result = Version::supported();

        $this->assertEquals(
            [
                "1.0.1",
                "1.0.0"
                //, "0.95"
            ],
            $result,
            "match supported"
        );
    }

    public function testLatest() {
        $result = Version::latest();

        $this->assertSame("1.0.1", $result, "match latest");
    }
}
