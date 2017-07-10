<?php


class ServicesListApiTest extends \Codeception\Test\Unit
{
    /**
     * @var \ApiTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function ReturnsValidJson()
    {
        $expectedData = [];
        $expectedData[0] = $this->registerService();
        $expectedData[1] = $this->registerService();

        $this->tester->sendGET('/api/services/json');

        $response = $this->tester->grabResponse();
        $responseData = \yii\helpers\Json::decode($response);

        $this->assertInternalType('array', $responseData);
        $this->assertEquals($expectedData[0], $responseData[0]);
        $this->assertEquals($expectedData[0], $responseData[1]);
    }

    public function hasJsonEndpoint()
    {
        $this->tester->sendGET('/api/services/json');
        $response = $this->tester->grabResponse();

        $this->tester->canSeeResponseCodeIs(200);
        $this->assertNotEquals('', $response);
    }

    public function returnsValidYaml()
    {
        $expectedData = [];
        $expectedData[0] = $this->registerService();
        $expectedData[1] = $this->registerService();

        $this->tester->sendGET('/api/services/yaml');

        $response = $this->tester->grabResponse();
        $responseData = \Symfony\Component\Yaml\Yaml::parse($response);

        $this->assertInternalType('array', $responseData);
        $this->assertEquals($expectedData[0], $responseData[0]);
        $this->assertEquals($expectedData[1], $responseData[1]);
    }

    public function hasYamlEndpoint()
    {
        $this->tester->sendGET('/api/services/yaml');
        $response = $this->tester->grabResponse();

        $this->tester->canSeeResponseCodeIs(200);
        $this->assertNotEquals('', $response);
    }

    private function registerService()
    {
        $service = $this->imagineService();

        $service->save();

        return $service->attributes;
    }

    private function imagineService()
    {
        $faker = \Faker\Factory::create();

        $service = new \app\models\service\ServiceRecord();
        $service->name = $faker->sentence($words = 3);
        $service->hourly_rate = $faker->randomNumber($digits = 2);

        return $service;
    }
}