<?php

namespace App\Controllers;

use App\Models\HospitalModel;

class Home extends BaseController
{
    public function index(): string
    {
        $hospitalModel = new HospitalModel();
        
        // 메인에는 최신 등록된 병원 몇 개를 노출
        $latestHospitals = $hospitalModel->orderBy('id', 'DESC')->findAll(8);

        $data = [
            'latestHospitals' => $latestHospitals,
            'seoTitle' => '전국 의료 서비스 종합 안내 | HealthCare',
            'seoDescription' => '전국 병원, 의원, 약국, 의료기기업 등 13개 의료 관련 서비스 정보를 한눈에 확인하세요.',
            'seoKeywords' => '병원, 의원, 약국, 의료기기, 안경, 치과기공, 산후조리원, 의료서비스',
            'canonicalUrl' => base_url(),
            'config' => [
                'search_placeholder' => '병원, 약국, 업체명 또는 지역 검색'
            ],
            'type' => 'hospitals'
        ];

        return view('welcome_message', $data);
    }
}
