type Props = {
    courses: App.Models.Course[];
};

export default function index({ courses }: Props) {
    return (
        <div>
            {courses.map((course) => (
                <pre key={course.id}>{JSON.stringify(course, null, 2)}</pre>
            ))}
        </div>
    );
}
