type Props = {
    course: App.Models.Course;
};

export default function show({ course }: Props) {
    return (
        <div>
            <pre>{JSON.stringify(course, null, 2)}</pre>
        </div>
    );
}
