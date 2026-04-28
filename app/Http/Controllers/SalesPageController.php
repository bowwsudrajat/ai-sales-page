<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SalesPage;
use Illuminate\Support\Str;

class SalesPageController extends Controller
{
  public function index()
  {
    return view('dashboard');
  }

  public function generate(Request $request)
  {
    $request->validate([
      'product_name' => 'required',
      'description' => 'required',
    ]);

    $productName = $request->product_name;
    $description = $request->description;
    $features = $request->features;
    $targetAudience = $request->target_audience;
    $price = $request->price;
    $usp = $request->usp;

    $prompt = "
    Create a professional high-converting sales page.

    Product Name:
    $productName

    Description:
    $description

    Features:
    $features

    Target Audience:
    $targetAudience

    Price:
    $price

    Unique Selling Point:
    $usp

    Return ONLY valid JSON.

    Example format:

    {
      \"headline\": \"...\",
      \"subheadline\": \"...\",
      \"description\": \"...\",
      \"benefits\": [
        \"...\",
        \"...\",
        \"...\"
      ],
      \"features\": [
        \"...\",
        \"...\"
      ],
      \"social_proof\": \"...\",
      \"pricing\": \"...\",
      \"cta\": \"...\"
    }
    ";

    $response = Http::withHeaders([
      'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
      'HTTP-Referer' => 'http://localhost:8000',
      'X-Title' => 'AI Sales Page Generator',
    ])->post('https://openrouter.ai/api/v1/chat/completions', [

      'model' => 'openai/gpt-4o-mini',

      'messages' => [
        [
          'role' => 'user',
          'content' => $prompt
        ]
      ]

    ]);

    $result = $response->json();

    $generatedText =
      $result['choices'][0]['message']['content']
      ?? '{}';

    $cleanJson = str_replace([
      '```json',
      '```'
    ], '', $generatedText);

    $generatedData = json_decode(trim($cleanJson), true);

    if (!$generatedData) {
      $generatedData = [
        'headline' => 'Failed to generate headline',
        'subheadline' => 'Please try again.',
        'description' => 'AI generation failed.',
        'benefits' => [],
        'features' => [],
        'social_proof' => '',
        'pricing' => $price,
        'cta' => 'Try Again'
      ];
    }

    SalesPage::create([
      'user_id' => auth()->id(),
      'product_name' => $productName,
      'input_data' => json_encode([
        'description' => $description,
        'features' => $features,
        'target_audience' => $targetAudience,
        'price' => $price,
        'usp' => $usp
      ]),
      'generated_content' => json_encode($generatedData)
    ]);

    return view('result', [
      'generatedData' => $generatedData
    ])->with(
      'success',
      'Sales page generated successfully!'
    );
  }

  public function history()
  {
    $salesPages = SalesPage::where('user_id', auth()->id())
      ->latest()
      ->get();

    return view('history', compact('salesPages'));
  }

  public function show($id)
  {
    $salesPage = SalesPage::where('user_id', auth()->id())
      ->findOrFail($id);

    $generatedData = json_decode(
      $salesPage->generated_content,
      true
    );

    return view('show', compact(
      'salesPage',
      'generatedData'
    ));
  }

  public function destroy($id)
  {
    $salesPage = SalesPage::where('user_id', auth()->id())
      ->findOrFail($id);

    $salesPage->delete();

    return redirect()
      ->route('history')
      ->with('success', 'Sales page deleted successfully.');
  }

  public function regenerate($id)
  {
    $salesPage = SalesPage::where(
      'user_id',
      auth()->id()
    )->findOrFail($id);

    $inputData = json_decode(
      $salesPage->input_data,
      true
    );

    $prompt = "
    Create a professional high-converting sales page.

    Product Name:
    {$salesPage->product_name}

    Description:
    {$inputData['description']}

    Features:
    {$inputData['features']}

    Target Audience:
    {$inputData['target_audience']}

    Price:
    {$inputData['price']}

    Unique Selling Point:
    {$inputData['usp']}

    Return ONLY valid JSON.

    Format:

    {
      \"headline\": \"...\",
      \"subheadline\": \"...\",
      \"description\": \"...\",
      \"benefits\": [],
      \"features\": [],
      \"social_proof\": \"...\",
      \"pricing\": \"...\",
      \"cta\": \"...\"
    }
    ";

    $response = Http::withHeaders([
      'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
      'HTTP-Referer' => 'http://localhost:8000',
      'X-Title' => 'AI Sales Page Generator',
    ])->post('https://openrouter.ai/api/v1/chat/completions', [

      'model' => 'openai/gpt-4o-mini',

      'messages' => [
        [
          'role' => 'user',
          'content' => $prompt
        ]
      ]

    ]);

    $result = $response->json();

    $generatedText =
      $result['choices'][0]['message']['content']
      ?? '{}';

    $cleanJson = str_replace([
      '```json',
      '```'
    ], '', $generatedText);

    $generatedData = json_decode(
      trim($cleanJson),
      true
    );

    $salesPage->update([
      'generated_content' => json_encode(
        $generatedData
      )
    ]);

    return redirect()->route(
      'sales.show',
      $salesPage->id
    );
  }

  public function export($id)
  {
    $salesPage = SalesPage::where(
      'user_id',
      auth()->id()
    )->findOrFail($id);

    $generatedData = json_decode(
      $salesPage->generated_content,
      true
    );

    $html = "
    <!DOCTYPE html>
    <html>
    <head>
      <title>{$salesPage->product_name}</title>

      <style>
        body {
          font-family: Arial;
          background: #f5f5f5;
          padding: 40px;
          color: #111;
        }

        .container {
          max-width: 1000px;
          margin: auto;
          background: white;
          border-radius: 20px;
          overflow: hidden;
        }

        .hero {
          background: black;
          color: white;
          padding: 80px;
          text-align: center;
        }

        .content {
          padding: 50px;
        }

        .card {
          background: #f3f4f6;
          padding: 20px;
          border-radius: 15px;
          margin-bottom: 15px;
        }

        .pricing {
          background: black;
          color: white;
          padding: 40px;
          border-radius: 20px;
          text-align: center;
        }

        .cta {
          display: inline-block;
          margin-top: 30px;
          background: blue;
          color: white;
          padding: 20px 40px;
          border-radius: 12px;
          text-decoration: none;
        }
      </style>

    </head>

    <body>

      <div class='container'>

        <div class='hero'>

          <h1>{$generatedData['headline']}</h1>

          <p>
            {$generatedData['subheadline']}
          </p>

        </div>

        <div class='content'>

          <h2>Description</h2>

          <p>
            {$generatedData['description']}
          </p>

          <h2>Benefits</h2>
    ";

    foreach ($generatedData['benefits'] as $benefit) {

      $html .= "
        <div class='card'>
          ✅ {$benefit}
        </div>
      ";
    }

    $html .= "<h2>Features</h2>";

    foreach ($generatedData['features'] as $feature) {

      $html .= "
        <div class='card'>
          {$feature}
        </div>
      ";
    }

    $html .= "

        <div class='pricing'>

          <h2>Pricing</h2>

          <h1>
            {$generatedData['pricing']}
          </h1>

          <a href='#' class='cta'>
            {$generatedData['cta']}
          </a>

        </div>

        </div>

      </div>

    </body>

    </html>
    ";

    return response($html)
      ->header(
        'Content-Type',
        'text/html'
      )
      ->header(
        'Content-Disposition',
        'attachment; filename=\"sales-page.html\"'
      );
  }

  public function regenerateSection($id, $section)
  {
    $salesPage = SalesPage::where(
      'user_id',
      auth()->id()
    )->findOrFail($id);

    $generatedData = json_decode(
      $salesPage->generated_content,
      true
    );

    $inputData = json_decode(
      $salesPage->input_data,
      true
    );

    $prompt = "
    Product Name:
    {$salesPage->product_name}

    Description:
    {$inputData['description']}

    Features:
    {$inputData['features']}

    Target Audience:
    {$inputData['target_audience']}

    Price:
    {$inputData['price']}

    USP:
    {$inputData['usp']}

    Regenerate ONLY this section:

    {$section}
    ";

    $response = Http::withHeaders([
      'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
      'HTTP-Referer' => 'http://localhost:8000',
      'X-Title' => 'AI Sales Page Generator',
    ])->post('https://openrouter.ai/api/v1/chat/completions', [

      'model' => 'openai/gpt-4o-mini',

      'messages' => [
        [
          'role' => 'user',
          'content' => $prompt
        ]
      ]

    ]);

    $result = $response->json();

    $newContent =
      trim(
        $result['choices'][0]['message']['content']
        ?? ''
      );

    if ($section === 'benefits') {

      $generatedData[$section] =
        explode("\n", $newContent);
    
    } else {
    
      $generatedData[$section] =
        $newContent;
    }

    $salesPage->update([
      'generated_content' => json_encode(
        $generatedData
      )
    ]);

    return back();
  }

}