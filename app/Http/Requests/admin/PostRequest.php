<?php

namespace App\Http\Requests\admin;

use App\Rules\admin\StatusRule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (isset($this->user_id)) {
            if ($this->user_id == auth()->user()->id) {
                return true;
            } else {
                return false;
            }
        }
        return true;
    }
    public function rules()
    {
        $post = $this->route()->parameter('post');

        $rules = [
            'title' => "required|unique:posts",
            'image' => "nullable|image|max:2048",
            'status' => ['required', new StatusRule()],
        ];

        if($post){
            $rules = array_merge($rules,[   
                'title' => "required|unique:posts,title,$post->id",
            ]);
        }

        if(! $post->image){
            $rules = array_merge($rules,[   
                'image' => "required|image|max:2048",
            ]);
        }

        if ($this->status == 1) {
            $rules = array_merge($rules, [
                'extract' => 'required|min:1|max:200',
                'body' => 'required|min:1|max:10000',
                'category_id' => 'required|exists:categories,id',
                'tags' => 'required|array|exists:tags,id',
            ]);
        }

        return $rules;
    }

    // Attributes
    public function attributes()
    {
        return [
            'title' => 'título',
            'extract' => 'extracto',
            'body' => 'cuerpo',
            'category_id' => 'categoría',
            'tags' => 'etiquetas',
            'image' => 'imagen',
        ];
    }

    // Messages
    public function messages()
    {
        return [
            'image.image' => 'El archivo debe ser una imagen.',
            'image.max' => 'El archivo debe pesar menos de 2MB.',
            'image.required' => 'La imagen es obligatoria si el post será publicado.',
            'category_id.required' => 'La :attribute es obligatoria.',
            'category_id.exists' => 'La :attribute no existe.',
        ];
    }
}
