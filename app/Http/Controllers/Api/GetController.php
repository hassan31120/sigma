<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\InfoResource;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\TeamResource;
use App\Models\Article;
use App\Models\Info;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function team()
    {
        $teams = Team::all();
        if (count($teams) > 0) {
            return response()->json([
                'success' => true,
                'team' => TeamResource::collection($teams)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'team' => []
            ], 404);
        }
    }

    public function info()
    {
        $info = Info::find(1);
        if ($info) {
            return response()->json([
                'success' => true,
                'info' => new InfoResource($info)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'info' => []
            ], 404);
        }
    }

    public function services()
    {
        $services = Service::all();
        if (count($services) > 0) {
            return response()->json([
                'success' => true,
                'services' => ServiceResource::collection($services)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'services' => []
            ], 404);
        }
    }

    public function partners()
    {
        $partners = Partner::all();
        if (count($partners) > 0) {
            return response()->json([
                'success' => true,
                'partners' => PartnerResource::collection($partners)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'partners' => []
            ], 404);
        }
    }

    public function articles()
    {
        $articles = Article::all();
        if (count($articles) > 0) {
            return response()->json([
                'success' => true,
                'articles' => ArticleResource::collection($articles)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'articles' => []
            ], 404);
        }
    }
}
