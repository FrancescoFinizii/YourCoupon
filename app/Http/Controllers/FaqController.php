<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    protected $_faqModel;

    public function __construct()
    {
        $this->_faqModel = Faq::paginate(10);
    }

    public function showFaq()
    {
        return view('level0.faq', ['faqs' => $this->_faqModel]);
    }

}
