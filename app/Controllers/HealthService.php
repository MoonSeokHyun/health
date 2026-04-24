<?php

namespace App\Controllers;

class HealthService extends BaseController
{
    private array $serviceConfig = [
        'hospitals' => [
            'model' => '\App\Models\HospitalModel',
            'title' => '전국 병원',
            'subtitle' => '종합병원, 일반병원, 요양병원 정보',
            'search_placeholder' => '병원명, 주소, 지역 검색',
            'keywords' => '병원, 종합병원, 요양병원, 지역별 병원, 병원 전화번호, 병원 위치',
            'desc' => '전국 병원의 위치, 연락처, 영업 상태 정보를 실시간으로 확인하고 검색하세요.',
        ],
        'clinics' => [
            'model' => '\App\Models\ClinicModel',
            'title' => '전국 의원',
            'subtitle' => '의원 및 개인병원 정보',
            'search_placeholder' => '의원명, 주소, 지역 검색',
            'keywords' => '의원, 내과, 외과, 소아과, 피부과, 정형외과, 이비인후과',
            'desc' => '동네 의원 및 개인병원 정보를 지역별로 찾아보고 연락처를 확인하세요.',
        ],
        'pharmacies' => [
            'model' => '\App\Models\PharmacyModel',
            'title' => '전국 약국',
            'subtitle' => '약국 및 조제약국 정보',
            'search_placeholder' => '약국명, 주소, 지역 검색',
            'keywords' => '약국, 24시 약국, 심야약국, 공휴일약국, 약국 전화번호',
            'desc' => '전국 약국 위치와 연락처 정보를 확인하세요. 24시간 운영 약국도 찾을 수 있습니다.',
        ],
        'otc-stores' => [
            'model' => '\App\Models\OtcMedicineStoreModel',
            'title' => '전국 안전상비의약품판매업',
            'subtitle' => '안전상비의약품 판매업소 정보',
            'search_placeholder' => '업소명, 주소, 지역 검색',
            'keywords' => '안전상비약, 일반의약품, 편의점 약, 진통제, 소화제',
            'desc' => '안전상비의약품을 판매하는 업소 정보를 확인하세요.',
        ],
        'device-sales' => [
            'model' => '\App\Models\MedicalDeviceSalesRentalModel',
            'title' => '전국 의료기기판매임대업',
            'subtitle' => '의료기기 판매 및 임대업체 정보',
            'search_placeholder' => '업체명, 주소, 지역 검색',
            'keywords' => '의료기기 판매, 의료기기 임대, 의료용품, 재활용품',
            'desc' => '전국 의료기기 판매 및 임대업체 정보를 확인하세요.',
        ],
        'device-repair' => [
            'model' => '\App\Models\MedicalDeviceRepairModel',
            'title' => '전국 의료기기수리업',
            'subtitle' => '의료기기 수리업체 정보',
            'search_placeholder' => '수리업체명, 주소 검색',
            'keywords' => '의료기기 수리, 의료장비 수리, 병원 장비 수리',
            'desc' => '전국 의료기기 수리업체 정보를 확인하세요.',
        ],
        'optical-shops' => [
            'model' => '\App\Models\OpticalShopModel',
            'title' => '전국 안경업',
            'subtitle' => '안경점 및 콘택트렌즈 판매점 정보',
            'search_placeholder' => '안경점명, 주소 검색',
            'keywords' => '안경점, 안경, 콘택트렌즈, 안경원, 시력검사',
            'desc' => '전국 안경점 정보를 확인하세요.',
        ],
        'dental-labs' => [
            'model' => '\App\Models\DentalLabModel',
            'title' => '전국 치과기공소',
            'subtitle' => '치과기공소 정보',
            'search_placeholder' => '기공소명, 주소 검색',
            'keywords' => '치과기공소, 치과기공, 틀니, 임플란트, 치과보철',
            'desc' => '전국 치과기공소 정보를 확인하세요.',
        ],
        'health-business' => [
            'model' => '\App\Models\HealthRelatedBusinessModel',
            'title' => '전국 의료유사업',
            'subtitle' => '의료유사업체 정보',
            'search_placeholder' => '업체명, 주소 검색',
            'keywords' => '의료유사업, 안마, 물리치료, 건강관리',
            'desc' => '전국 의료유사업체 정보를 확인하세요.',
        ],
        'medical-corps' => [
            'model' => '\App\Models\MedicalCorporationModel',
            'title' => '전국 의료법인',
            'subtitle' => '의료법인 정보',
            'search_placeholder' => '법인명, 주소 검색',
            'keywords' => '의료법인, 의료재단, 의료기관 법인',
            'desc' => '전국 의료법인 정보를 확인하세요.',
        ],
        'affiliated-inst' => [
            'model' => '\App\Models\AffiliatedMedicalInstitutionModel',
            'title' => '전국 부속의료기관',
            'subtitle' => '부속의료기관 정보',
            'search_placeholder' => '기관명, 주소 검색',
            'keywords' => '부속의료기관, 학교부속병원, 기업부속의원',
            'desc' => '전국 부속의료기관 정보를 확인하세요.',
        ],
        'postpartum' => [
            'model' => '\App\Models\PostpartumCareFacilityModel',
            'title' => '전국 산후조리업',
            'subtitle' => '산후조리원 정보',
            'search_placeholder' => '산후조리원명, 주소 검색',
            'keywords' => '산후조리원, 산모, 신생아, 산후관리',
            'desc' => '전국 산후조리원 정보를 확인하세요.',
        ],
        'emergency-transport' => [
            'model' => '\App\Models\EmergencyTransportModel',
            'title' => '전국 응급환자이송업',
            'subtitle' => '응급환자 이송업체 정보',
            'search_placeholder' => '이송업체명, 주소 검색',
            'keywords' => '응급환자 이송, 구급차, 환자이송',
            'desc' => '전국 응급환자 이송업체 정보를 확인하세요.',
        ],
    ];

    /**
     * Helper: get the best available address from an item row.
     */
    private function getAddress(array $item): string
    {
        return $item['road_address'] ?? ($item['lot_address'] ?? '');
    }

    /**
     * Helper: get type/business category name.
     */
    private function getBusinessType(array $item): string
    {
        return $item['business_category']
            ?? $item['institution_type_name']
            ?? $item['health_business_type_name']
            ?? $item['detail_status_name']
            ?? '';
    }

    public function index(string $type = 'hospitals')
    {
        if (!isset($this->serviceConfig[$type])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("요청하신 서비스를 찾을 수 없습니다.");
        }

        $config = $this->serviceConfig[$type];
        $modelClass = $config['model'];
        $model = new $modelClass();

        $search = trim((string) $this->request->getGet('search'));
        $perPage = 12;
        $page = max(1, (int) ($this->request->getGet('page') ?? 1));

        if ($search !== '') {
            $model->groupStart()
                  ->like('business_name', $search)
                  ->orLike('road_address', $search)
                  ->orLike('lot_address', $search)
                  ->orLike('phone_number', $search)
                  ->groupEnd();
        }

        $items = $model->orderBy('id', 'DESC')->paginate($perPage);

        $data = [
            'type' => $type,
            'items' => $items,
            'pager' => $model->pager,
            'search' => $search,
            'config' => $config,
            'seoTitle' => ($search !== '' ? "\"{$search}\" " : '') . $config['title'] . ' 위치/연락처 목록 | HealthCare',
            'seoDescription' => $search !== '' ? "{$search} 관련 {$config['title']} 검색 결과입니다." : ($config['desc'] ?? "전국 {$config['title']} 정보를 확인하세요."),
            'seoKeywords' => $config['keywords'],
            'canonicalUrl' => site_url($type),
            'currentPage' => $page,
        ];

        return view('services/index', $data);
    }

    public function detail(string $type, string $id)
    {
        if (!isset($this->serviceConfig[$type])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $config = $this->serviceConfig[$type];
        $modelClass = $config['model'];
        $model = new $modelClass();
        $naverModel = new \App\Models\NaverApiModel();

        $item = $model->find($id);
        if (!$item) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $name = $item['business_name'] ?? '';
        $fullAddress = $this->getAddress($item);
        
        // 지도 좌표 가져오기
        $mapData = $naverModel->map($fullAddress);

        // 네이버 블로그 검색
        $blogJson = $naverModel->blog($name);
        $blog = $blogJson ? json_decode($blogJson, true) : [];

        // 관련 업체 (같은 시/군/구 내)
        $addressParts = explode(' ', $fullAddress);
        $city = $addressParts[0] ?? '';
        $county = $addressParts[1] ?? '';

        $relatedItems = [];
        if ($city !== '') {
            $relatedItems = $model
                ->select('id, business_name, road_address, lot_address')
                ->groupStart()
                    ->like('road_address', $city . ' ' . $county)
                    ->orLike('lot_address', $city . ' ' . $county)
                ->groupEnd()
                ->where('id !=', $item['id'])
                ->orderBy('id', 'DESC')
                ->findAll(6);
        }

        $typeName = $this->getBusinessType($item);

        $jsonLd = [
            '@context' => 'https://schema.org',
            '@type' => 'MedicalBusiness',
            'name' => $name,
            'description' => $name . ' - ' . $config['title'] . ' 상세 정보',
            'url' => current_url(),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $fullAddress,
                'addressCountry' => 'KR',
            ],
            'telephone' => $item['phone_number'] ?? '',
        ];

        return view('services/detail', [
            'type' => $type,
            'item' => $item,
            'blog' => $blog,
            'mapData' => $mapData,
            'relatedItems' => $relatedItems,
            'config' => $config,
            'seoTitle' => $name . ' - ' . $config['title'] . ' 위치/전화번호 안내 | HealthCare',
            'seoDescription' => $name . '의 주소, 연락처, 영업 상태 등 상세 정보를 확인하세요.',
            'seoKeywords' => $name . ', ' . $city . ', ' . $county . ', ' . $config['title'],
            'canonicalUrl' => current_url(),
            'jsonLd' => $jsonLd,
            'businessTypeName' => $typeName,
        ]);
    }
}
