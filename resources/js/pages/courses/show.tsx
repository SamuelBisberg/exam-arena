import React from 'react'

type Props = {
  course: object;
}

export default function show({ course }: Props) {
  return (
    <div>
      <pre>{JSON.stringify(course, null, 2)}</pre>
    </div>
  )
}