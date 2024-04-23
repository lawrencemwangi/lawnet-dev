<x-app-layout>        
    <div class="project_container">
        <div class="project_item"> 
            <div class="image">
                {{-- <iframe src="{{ $project->iframe }}" frameborder="0"></iframe> --}}
            </div>
            <h3>{{ $project->title }}</h3> 
            <p>{{ $project->description}}</p>
            
            <div class="project_btn ">
                <button type="submit">
                    <a href="{{ $project->link }}" target="_blank">View</a>    
                </button>
            </div>
                       
        </div>
    </div>

</x-app-layout>