<?php
declare(strict_types = 1);

namespace App\Region\Executor\Polygon;

use GuzzleHttp\Client;
use Illuminate\Log\LogManager;

class PolygonRetriever
{
    public function __construct(private readonly LogManager $logManager)
    {
    }
    
    public function getPolygons(string $regionName): array
    {
        // TODO: actually it is required to improve for manage different type of error response and do re-call
        $baseURL = 'https://nominatim.openstreetmap.org/search.php';
        $params = [
            'format'          => 'json',
            'polygon_geojson' => 1,
        ];
        
        $client = new Client();
        
        $params['q'] = "{$regionName}, Ukraine";
        $url = $baseURL . '?' . http_build_query($params);
        
        try {
            // TODO: query parameters should be without http_build_query
            $response = $client->get($url, ['headers' => ['User-Agent' => 'My app']]);
            
            return json_decode($response->getBody()->__toString(), true);
        } catch (\Throwable $e) {
            $this->logManager->error('ERROR_DURING_GET_DATA_FROM_openstreetmap', [
                'error_message' => $e->getMessage(),
                'region_name'   => $regionName,
            ]);
            
            throw  $e;
        }
    }
}
