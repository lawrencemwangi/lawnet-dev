<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
            <div class="project_container">
                <div class="project_content">
                    <h1>Update Project</h1>

                    <form action="{{ route('projects.update',['project' => $project] ) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="input_group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" placeholder="Enter the title" value="{{ old('title',$project->title)}}">
                        </div>
    
                        <div class="input_group">
                            <label for="iframe">Iframe</label>
                            <input type="text" name="iframe" id="iframe" placeholder="Link of the iframe " value="{{ old('iframe',$project->iframe)}}">
                        </div>

                        <div class="input_group">
                            <label for="link">Link</label>
                            <input type="link" name="link" id="link" placeholder="Link of the link " value="{{ old('link',$project->link)}}">
                        </div>
    
                        <div class="input_group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="7" rows="7" placeholder="Enter the description">{{ old('description',$project->description) }}</textarea>
                        </div>

                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>