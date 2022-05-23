/**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    
    public function render($request, Exception $exception)
    {
        // 404 page when a model is not found
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }
        //500 server error custom error message
        else if ($exception instanceof \ErrorException) {
        return parent::render($request, $exception);
         // return response()->view('errors.500', [], 500);
        } else {
           //return response()->view('errors.manutencao', [], 500);
           return parent::render($request, $exception);
        }
        
        return parent::render($request, $exception);
    }