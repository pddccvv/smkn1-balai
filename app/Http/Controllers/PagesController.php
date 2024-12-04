<?php

namespace App\Http\Controllers;

use App\Models\{
    Accreditation,
    Achievement,
    Contact,
    Extracurricular,
    Facility,
    Future,
    Gallery,
    Graduation,
    Major,
    News,
    Organizational,
    Student,
    Subject,
    Teacher,
    Welcome
};
use Carbon\Carbon;

class PagesController extends Controller
{
    public function loginFirst()
    {
        return view('errors.login_required');
    }

    // Profile Pages
    public function about()
    {
        return $this->renderProfilePage('about');
    }
    public function welcome()
    {
        return $this->renderProfilePage('welcome', ['welcomes' => $this->getFormattedWelcomes()]);
    }
    public function future()
    {
        return $this->renderProfilePage('future', ['futures' => $this->getFormattedFutures()]);
    }
    public function organizational()
    {
        $organizationals = $this->getFormattedOrganizational();
        return $this->renderProfilePage('organizational', [
            'groupedOrganizationals' => $organizationals->groupBy('jabatan'),
            'organizationals' => $organizationals
        ]);
    }
    public function accreditation()
    {
        return view('profile.accreditation', [
            'accreditations' => $this->getFormattedAccreditations()
        ]);
    }

    // Activity Pages
    public function extracurricular()
    {
        return $this->renderActivityPage('extracurricular', ['extracurriculars' => $this->getFormattedExtracurriculars()]);
    }
    public function report()
    {
        return $this->renderActivityPage('activity_report');
    }

    // Information Pages
    public function major()
    {
        return $this->renderInformationPage('major', ['majors' => $this->getFormattedMajors()]);
    }
    public function achievement()
    {
        return $this->renderInformationPage('achievement', ['achievements' => $this->getFormattedAchievements()]);
    }

    public function teachers()
    {
        return $this->renderInformationPage('teachers', ['teachers' => $this->getFormattedTeachers()]);
    }
    public function ppdb()
    {
        return $this->renderInformationPage('ppdb_online');
    }
    public function facility()
    {
        return $this->renderInformationPage('facility', ['facilities' => $this->getFormattedFacilities()]);
    }
    public function timetable()
    {
        return $this->renderInformationPage('timetable', ['subjects' => $this->getFormattedSubjects()]);
    }
    public function graduation()
    {
        return $this->renderInformationPage('graduation', ['graduations' => $this->getFormattedGraduations()]);
    }

    // News Pages
    public function news()
    {
        return view('pages.information.news', ['news' => $this->getFormattedNews()]);
    }
    public function showNews($id)
    {
        return view('news.show', ['news' => News::findOrFail($id)]);
    }

    // Gallery Pages
    public function photos()
    {
        return $this->renderGalleryPage('photos', ['photos' => $this->getFormattedPhotos()]);
    }
    public function videos()
    {
        return $this->renderGalleryPage('videos', ['videos' => $this->getFormattedVideos()]);
    }

    // Contact Page
    public function contact()
    {
        return view('pages.contact.contact_informartion', ['contact' => $this->getFormattedContact()]);
    }

    // Helper Methods
    private function renderProfilePage($page, array $data = [])
    {
        return view("pages.profile.$page", $data);
    }
    private function renderActivityPage($page, array $data = [])
    {
        return view("pages.activity.$page", $data);
    }
    private function renderInformationPage($page, array $data = [])
    {
        return view("pages.information.$page", $data);
    }
    private function renderGalleryPage($page, array $data = [])
    {
        return view("pages.gallery.$page", $data);
    }

    private function getFormattedNews()
    {
        return News::latest('published_at')->get()->map(fn($item) => $this->formatPublishedAt($item));
    }
    private function getFormattedFacilities()
    {
        return Facility::all();
    }
    private function getFormattedTeachers()
    {
        return Teacher::with('major')->get()->groupBy(fn($teacher) => $teacher->major->name ?? 'Tidak ada jurusan')->map(fn($group) => $this->mapTeacherData($group));
    }

    private function getFormattedSubjects()
    {
        return Subject::with('major')->get()->map(fn($subject) => $this->mapSubjectData($subject));
    }
    private function getFormattedGraduations()
    {
        return Graduation::with('major')->get()->map(fn($graduation) => $this->mapGraduationData($graduation));
    }
    private function getFormattedAchievements()
    {
        return Achievement::all();
    }
    private function getFormattedWelcomes()
    {
        return Welcome::all();
    }
    private function getFormattedMajors()
    {
        return Major::all();
    }
    private function getFormattedFutures()
    {
        return Future::first();
    }
    private function getFormattedAccreditations()
    {
        return Accreditation::all();
    }
    private function getFormattedExtracurriculars()
    {
        return Extracurricular::all();
    }
    private function getFormattedPhotos()
    {
        return $this->getFormattedGallery('photo');
    }
    private function getFormattedVideos()
    {
        return $this->getFormattedGallery('video');
    }
    private function getFormattedContact()
    {
        return Contact::first() ?? new Contact();
    }
    private function getFormattedOrganizational()
    {
        $organizationals = Organizational::all();
        return $organizationals->isNotEmpty() ? $organizationals : collect();
    }


    // Formatting Helpers
    private function formatPublishedAt($item)
    {
        $item->published_at = $item->published_at ? Carbon::parse($item->published_at) : null;
        return $item;
    }

    private function mapTeacherData($group)
    {
        return $group->map(fn($teacher) => [
            'name' => $teacher->name,
            'nip' => $teacher->nip,
            'major' => $teacher->major->name ?? 'Tidak ada jurusan',
            'sex' => $teacher->sex,
            'photo' => $teacher->photo,
        ]);
    }

    private function mapSubjectData($subject)
    {
        return [
            'major' => $subject->major ? $subject->major->name : null,
            'subject' => $subject,
            'photo_url' => $subject->getPhotoUrl(),
            'is_image' => $subject->isImage(),
            'semester' => $subject->semester,
            'class' => $subject->class,
        ];
    }

    private function mapGraduationData($graduation)
    {
        return [
            'major' => $graduation->major->name,
            'year' => $graduation->year,
            'pdf_url' => $graduation->getPdfUrl(),
        ];
    }

    private function getFormattedGallery($type)
    {
        return Gallery::where('type', $type)->get()->flatMap(function ($gallery) {
            return is_array($gallery->file)
                ? array_map(fn($file) => ['id' => $gallery->id, 'file' => trim($file)], $gallery->file)
                : [['id' => $gallery->id, 'file' => trim($gallery->file)]];
        });
    }
}
