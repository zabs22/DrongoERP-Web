<?php

namespace App\Http\Controllers;

use App\Models\LiveDemoViewer;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class LiveDemoViewerController extends Controller
{
    public function liveDemoViewerSubmit(Request $request){
        try{
            $validatedData = $request->validate([   
                'email' => 'required|email',   
            ]); 

            $liveDemoViewer = LiveDemoViewer::create($validatedData); 

            return redirect()->to('https://demo.drongoerp.com/')->withInput($validatedData);
        
        }
            
            catch (\Illuminate\Validation\ValidationException $e) {
                return redirect()->back()
                    ->withErrors($e->validator)
                    ->withInput(); 

            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'An error occurred: ' . $e->getMessage());
            }
    } 
    public function contactMessage(Request $request){
        try{
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'comment' => 'required|string',
            ]);

            $contactMessage = LiveDemoViewer::create($data);
            
            return redirect()->back()->with('message', 'Your message was sent successfully.');
        }

            catch (\Illuminate\Validation\ValidationException $e) {
                return redirect()->back()
                    ->withErrors($e->validator)
                    ->withInput(); 

            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'An error occurred: ' . $e->getMessage());
            }
    }

}
