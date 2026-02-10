type Props = {
  courses: object[];
}

export default function index({ courses }: Props) {
  return (
    <div>
      {courses.map((course: object) => (
        <pre id={course.id}>{JSON.stringify(course, null, 2)}</pre>
      ))}
    </div>
  )
}