$post = new post();
        $post ->name= $request->name;
        $post ->email= $request->email;
        $post->password=$request->password;
        $post ->status= $request->status;
        $post ->number= $request->number;

            if(!empty($request->profile))
            {

                $post->profile=$filename;
                $request->profile->move(public_path('/backend/dist/img/upload/post'), $filename);
            }

        if($post->save())
        {
            return redirect(route('dashboard.posts.index'));
        }else{
            return redirect()->back();
        }
    }
