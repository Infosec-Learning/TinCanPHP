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

namespace TinCan;

class Agent implements VersionableInterface, StatementTargetInterface {
    use FromJSONTrait;
    private $objectType = 'Agent';

    protected $name;
    protected $mbox;
    protected $mbox_sha1sum;
    protected $openid;
    protected $account;

    public function __construct() {
        if (func_num_args() == 1) {
            $arg = func_get_arg(0);

            if (isset($arg['name'])) {
                $this->setName($arg['name']);
            }
            if (isset($arg['mbox'])) {
                $this->setMbox($arg['mbox']);
            }
        }
    }

    public function asVersion($version) {
        $result = array(
            'objectType' => $this->objectType
        );

        if (isset($this->name)) {
            $result['name'] = $this->name;
        }
        if (isset($this->mbox)) {
            $result['mbox'] = $this->mbox;
        }

        return $result;
    }

    public function getObjectType() { return $this->objectType; }

    public function setName($value) { $this->name = $value; return $this; }
    public function getName() { return $this->name; }

    // TODO: prepend 'mailto:' when not present
    public function setMbox($value) { $this->mbox = $value; return $this; }
    public function getMbox() { return $this->mbox; }
}