<?php

namespace app\Repository;

class testRepositoryPDO implements testRepositoryInterface
{

  public function test()
  {
    return 'test repository is ok';
  }
}